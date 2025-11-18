/*=============================================
Editar administrador - AJAX
=============================================*/

$(document).ready(function(){

    $("#formEditarAdmin").on("submit", function(e){
        e.preventDefault();

        // ✅ Validación usando tus funciones globales
        let valido = true;
        $(this).find("input, select").each(function(){
            const tipo = $(this).attr("type") || "texto";
            if(!validarJs({target: this}, tipo)){
                valido = false;
            }
        });

        if(!valido){
            sweetAlert("Error", "Por favor corrige los campos marcados", "error");
            return;
        }

        // ✅ Preparar los datos del formulario
        let datos = new FormData(this);

        $.ajax({
            url: "ajax/administradores/administradores.ajax.php", // misma ruta que usa 'crear'
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                console.log("Respuesta del servidor:", respuesta);

                try {
                    let json = JSON.parse(respuesta);

                    if(json.status === "ok"){
                        sweetAlert("Éxito", "Administrador actualizado correctamente", "success");
                        setTimeout(() => {
                            window.location = "administradores/listado";
                        }, 1500);
                    }else{
                        sweetAlert("Error", json.msg || "No se pudo actualizar el administrador", "error");
                    }

                } catch(e){
                    console.error("Error parseando respuesta:", e);
                    sweetAlert("Error", "Respuesta no válida del servidor", "error");
                }
            },
            error: function(err){
                console.error("Error AJAX:", err);
                sweetAlert("Error", "No se pudo conectar con el servidor", "error");
            }
        });

    });

});
