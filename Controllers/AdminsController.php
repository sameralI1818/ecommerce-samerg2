<?php

require_once "Models/AdminsModel.php";

class AdminsController{

    /*=================================
    Login
    =================================*/
    public function login(){
        $mensaje = "";

        //validamos variables post
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email = filter_var(trim($_POST['emailAdmin'] ?? ''), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['passwordAdmin']);

            //validaciones básicas
            if(empty($email) || empty($password)){
                return 'Por favor, completa todos los campos';
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return 'El formato del correo electrónico no es válido';
            }

            if(strlen($password) < 8){
                return 'La contraseña debe incluir al menos 8 caracteres';
            }

            $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

            if(!preg_match($patron,$password)){
                return 'La contraseña debe incluir mayúsculas, minúsculas, números y caracteres especiales';
            }

            //Buscar administrador en la base de datos si pasa todas las validaciones

            $adminModel = new AdminsModel();
            $admin = $adminModel->findByEmail($email);

            // var_dump($admin);
            // echo '<pre>';print_r($admin);echo '</pre>';
            // return;

            if(!$admin){
                return 'Administrador no encontrado';
            }

            //Para cuando esté la contraseña encriptada
            if(!password_verify($password, $admin['password_administrador'])){
                 return 'Contraseña incorrecta';
            }

            // if($password !== $admin['password_administrador']){
            //     return 'Contraseña incorrecta';
            // }

            AdminsModel::updateLastLogin((int)$admin['id_administrador']);

            $_SESSION['admin']= "ok";

            $_SESSION['admin_id'] = $admin['id_administrador'];
            $_SESSION['admin_email'] = $admin['email_administrador'];
            $_SESSION['admin_nombre'] = $admin['nombre_administrador'];

            echo '<script>location.reload();</script>';

        }

        return $mensaje; //vacío si no se ha enviado o no hubo errores
    }

    /*=================================
    Registrar
    =================================*/
    public function registrar()
    {
        $mensaje = "";

        //solo procesar si viene por post
        if(($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST'){
            return $mensaje;
        }

        //opcional pero recomendado verificación CSRF

        //1 Captura y sanitización
        $nombre = trim((string)($_POST['nombre_administrador'] ?? ''));
        $email = filter_var(trim((string)($_POST['email_administrador'] ?? '')), FILTER_SANITIZE_EMAIL);
        $password = trim((string)($_POST['password_administrador'] ?? ''));
        //$passwordConfirm = trim((string)($_POST['password_confirm_administrador'] ?? ''));
        $rol = trim((string)($_POST['rol_administrador'] ?? 'administrador'));

        //2 validaciones básicas
        if(
            $nombre === ''||
            $email === '' ||
            $password === ''
            //|| $passwordConfirm === ''
        ){
            return 'Por favor, completa todos los campos obligatorios';
        }

        //validar el formato de email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'El formato del correo electrónico no es válido';
        }

        //3) reglas de contraseña

        // if(strlen($password) < 8){
        //     return 'La contraseña debe tener al menos 8 caracteres';
        // }

        // if($password !== $passwordConfirm){
        //     return 'Las contraseñas no coinciden';
        // }

        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

        if(!preg_match($regex, $password)){
            return 'La contraseña debe incluir mayúsculas,minúsculas,números y caracteres especiales';
        }

        //4) normaliza/valida roles permitidos
        $rolesPermitidos = ['administrador', 'editor', 'superadministrador'];

        if(!in_array($rol, $rolesPermitidos)){
            $rol = 'administrador';
        }

        try{

            $adminModel = new AdminsModel();

            //verificar email único
            $existe = $adminModel->findByEmail($email);
            if($existe){ 
                return 'El correo ya está registrado';
            }

            // if($adminModel->findByEmail($email)){ 
            //     return 'El correo ya está registrado';
            // }


            //otro hash seguro
            // $hash = password_hash($password, PASSWORD_DEFAULT);

            $opts = [
                'memory_cost' => 1 << 17, //128mb
                'time_cost' => 4,
                'threads'   => 2,
            ];

            $hash = password_hash($password, PASSWORD_ARGON2ID, $opts); // más seguro

            $idnuevo = $adminModel->create([
                'nombre_administrador'    => $nombre,
                'email_administrador'     => $email,
                'password_administrador'  => $hash,
                'is_active_administrador' => 1,
            ]);


            if(!$idnuevo){
                return 'No se pudo registrar el administrador. Intente nuevamente';
            }

            echo '
                <script>
                    formatearCamposFormulario();
                    sweetAlert("Registro exitoso", "Administrador registrado exitosamente", "success", "/admin/administradores");
                </script>
            ';

        }catch(Throwable $e){
            error_log('[registrar admin]'. $e->getMessage());
            return 'Ocurrió un error inesperado al registrar. Intenta nuevamente.';
        }   



    }

/*=================================
Obtener datos de un administrador por ID
=================================*/
public function show(int $id): ?array
{
    $adminModel = new AdminsModel();
    $admin = $adminModel->findById($id); // Necesitamos crear este método en el modelo
    return $admin ?: null;
}

/*=================================
Actualizar administrador
=================================*/
public function actualizar(int $id_admin)
{
    $mensaje = "";

    if(($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST'){
        return $mensaje;
    }

    $nombre = trim((string)($_POST['nombre_administrador'] ?? ''));
    $email = filter_var(trim((string)($_POST['email_administrador'] ?? '')), FILTER_SANITIZE_EMAIL);
    $password = trim((string)($_POST['password_administrador'] ?? ''));
    $rol = trim((string)($_POST['rol_administrador'] ?? 'administrador'));

    if($nombre === '' || $email === ''){
        return 'Por favor, completa todos los campos obligatorios';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'El formato del correo electrónico no es válido';
    }

    $rolesPermitidos = ['administrador', 'editor', 'superadministrador'];
    if(!in_array($rol, $rolesPermitidos)){
        $rol = 'administrador';
    }

    try {
        $adminModel = new AdminsModel();
        $adminExistente = $adminModel->findByEmail($email);

        // Si el email existe y no es del mismo admin, error
        if($adminExistente && (int)$adminExistente['id_administrador'] !== $id_admin){
            return 'El correo ya está registrado';
        }

        $datosActualizar = [
            'nombre_administrador' => $nombre,
            'email_administrador'  => $email,
            'rol_administrador'    => $rol,
        ];

        // Actualiza la contraseña solo si se ingresó nueva
        if($password !== ''){
            $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
            if(!preg_match($regex, $password)){
                return 'La contraseña debe incluir mayúsculas, minúsculas, números y caracteres especiales';
            }

            $opts = [
                'memory_cost' => 1 << 17, //128mb
                'time_cost' => 4,
                'threads'   => 2,
            ];

            $datosActualizar['password_administrador'] = password_hash($password, PASSWORD_ARGON2ID, $opts);
        }

        $actualizado = $adminModel->update($id_admin, $datosActualizar); // método update en el modelo

        if(!$actualizado){
            return 'No se pudo actualizar el administrador. Intenta nuevamente';
        }

        echo '
            <script>
                formatearCamposFormulario();
                sweetAlert("Actualización exitosa", "Administrador actualizado correctamente", "success", "/admin/administradores");
            </script>
        ';

    } catch(Throwable $e){
        error_log('[actualizar admin]'. $e->getMessage());
        return 'Ocurrió un error inesperado al actualizar. Intenta nuevamente.';
    }
}


}
