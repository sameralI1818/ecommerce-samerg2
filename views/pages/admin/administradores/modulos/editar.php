<?php
require_once "Controllers/AdminsController.php";
$controller = new AdminsController();

// Capturar ID desde la URL /admin/administradores/editar/{id}
$id_admin = (int)($arrayRutas[3] ?? 0);
$admin = $controller->show($id_admin);

if(!$admin){
    echo '<div class="alert alert-danger text-center mt-4">Administrador no encontrado</div>';
    return;
}
?>

<div class="content">
   <div class="container">
       <div class="card">

           <form class="needs-validations" method="post" novalidate>

               <!-- Header -->
               <div class="card-header">
                   <div class="container">
                       <div class="row">
                           <div class="col-12 col-lg-6 text-center text-lg-left">
                               <h4 class="mt-3">Editar Administrador</h4>
                           </div>

                           <div class="col-12 col-lg-6 mt-2 d-none d-lg-block">
                               <button type="submit" class="btn border-0 bg-principal float-right py-2 px-3 btn-sm rounded-pill">Guardar cambios</button>
                               <a href="/admin/administradores" class="btn btn-sm btn-default float-right py-2 px-3 mr-2 rounded-pill">Regresar</a>
                           </div>

                           <div class="col-12 text-center d-flex justify-content-center mt-2 d-block d-lg-none">
                               <div>
                                   <a href="/admin/administradores" class="btn btn-xs btn-default py-2 px-3 rounded-pill mr-2">Regresar</a>
                               </div>
                               <div>
                                   <button class="btn border-0 bg-principal py-2 px-3 btn-xs rounded-pill" type="submit">Guardar</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Body -->
               <div class="card-body">
                   <div class="row row-cols-1 row-cols-md-2">
                       <!-- Izquierda -->
                       <div class="col">
                           <div class="card">
                               <div class="card-body">

                                   <!-- Nombre -->
                                   <div class="form-group pb-3">
                                       <label for="nombre_administrador">Nombre <sup class="text-danger">*</sup></label>
                                       <input 
                                           type="text" 
                                           name="nombre_administrador" 
                                           id="nombre_administrador" 
                                           class="form-control"
                                           value="<?= htmlspecialchars($admin['nombre_administrador']); ?>"
                                           onchange="validarJs(event, 'texto')"
                                           onblur="validarJs(event,'texto')"
                                           required>
                                       <div class="valid-feedback">Válido</div>
                                       <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                   </div>

                                   <!-- Rol -->
                                   <div class="form-group pb-3">
                                       <label for="rol_administrador">Rol <sup class="text-danger">*</sup></label>
                                       <select name="rol_administrador" id="rol_administrador" class="form-control" required>
                                           <option value="">Elije un rol</option>
                                           <option value="administrador" <?= $admin['rol_administrador'] === 'administrador' ? 'selected' : '' ?>>Administrador</option>
                                           <option value="editor" <?= $admin['rol_administrador'] === 'editor' ? 'selected' : '' ?>>Editor</option>
                                       </select>
                                       <div class="valid-feedback">Válido</div>
                                       <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                   </div>

                               </div>
                           </div>
                       </div>

                       <!-- Derecha -->
                       <div class="col">
                           <div class="card">
                               <div class="card-body">

                                   <!-- Email -->
                                   <div class="form-group pb-3">
                                       <label for="email_administrador">Email <sup class="text-danger">*</sup></label>
                                       <input 
                                           type="email" 
                                           name="email_administrador" 
                                           id="email_administrador" 
                                           class="form-control"
                                           value="<?= htmlspecialchars($admin['email_administrador']); ?>"
                                           onchange="validarJs(event, 'email')"
                                           onblur="validarJs(event,'email')"
                                           required>
                                       <div class="valid-feedback">Válido</div>
                                       <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                   </div>

                                   <!-- Password -->
                                   <div class="form-group pb-3">
                                       <label for="password_administrador">Password</label>
                                       <input 
                                           type="password" 
                                           name="password_administrador" 
                                           id="password_administrador" 
                                           class="form-control"
                                           placeholder="Ingresa nueva contraseña si deseas cambiarla"
                                           onchange="validarJs(event, 'password')"
                                           onblur="validarJs(event,'password')">
                                       <div class="valid-feedback">Válido</div>
                                       <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <?php
                   // Lógica para actualización
                   $mensaje = $controller->actualizar($id_admin);

                   if(!empty($mensaje)){
                       echo '<div class="alert alert-warning text-center bt-3 mx-3" role="alert">'.$mensaje.'</div>
                       <script>
                           formatearCamposFormulario();
                           sweetAlert("Atención", "'.$mensaje.'", "warning");
                       </script>';
                   }
               ?>

               <!-- Footer -->
               <div class="card-footer">
                   <div class="container">
                       <div class="row">
                           <div class="col-12 col-lg-6 text-center text-lg-left mt-lg-3">
                               <label class="font-weight-light">
                                   <sup class="text-danger">*</sup>Campos obligatorios
                               </label>
                           </div>

                           <div class="col-12 col-lg-6 mt-2 d-none d-lg-block">
                               <button type="submit" class="btn border-0 bg-principal float-right py-2 px-3 btn-sm rounded-pill">Guardar cambios</button>
                               <a href="/admin/administradores" class="btn btn-sm btn-default float-right py-2 px-3 mr-2 rounded-pill">Regresar</a>
                           </div>

                           <div class="col-12 text-center d-flex justify-content-center mt-2 d-block d-lg-none">
                               <div>
                                   <a href="/admin/administradores" class="btn btn-xs btn-default py-2 px-3 rounded-pill mr-2">Regresar</a>
                               </div>
                               <div>
                                   <button type="submit" class="btn border-0 bg-principal py-2 px-3 btn-xs rounded-pill">Guardar</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
</div>
