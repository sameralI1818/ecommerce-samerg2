/*==========================================

Formatear envio de formularios / limpia los campos
==========================================*/
function formatearCamposFormulario(){
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
}


/*==========================================

SweetAlert2

==========================================*/


 

function sweetAlert(titulo,text,icono,url = null){


 

    if(!url){

        Swal.fire({

        title: titulo,

        text: text,

        icon: icono

        });

    }else{

        Swal.fire({

        title: titulo,

        text: text,

        icon: icono,

        showCancelButton: true,

        confirmButtonColor: "#3085d6",

        cancelButtonColor: "#d33",

        confirmButtonText: "Yes, delete it!"

        }).then((result) => {

            if (result.isConfirmed) {

                window.location.href = url;

            }

        });

    }


 

}