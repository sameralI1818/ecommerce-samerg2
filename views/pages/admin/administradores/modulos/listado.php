<div class="content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title text-white">
                    <a href="/admin/administradores/creacion" class="btn btn-principal py-2 px-3 btn-sm rounded-pill text-reset"> 
                        <i class="fas fa-user-plus me-1"></i>Agregar Administrador
                    </a>
                </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle w-100" id="tablaAdmins">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Último Login</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody></tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
    

<script>
 $(document).ready(function(){

    //evita el popup de warning de DataTable por respuestas AJAX personalizadas
    $.fn.dataTable.ext.errMode = 'none';

    const tablaAdmins = $("#tablaAdmins").DataTable({
        processing:true,
        serverSide:true,
        ajax:{
            url: "<?=$path?>ajax/administradores/listaAdministradores.php",
            type:"GET",
            dataSrc: function(json){
                if(json && json.logout){
                    window.location.href = json.redirect || '/salir';
                    return [];
                }
                return json.data || [];
            }
        },
        columns:[
            {data:0, className:"text-center"},
            {data:1, className:"text-capitalize"},
            {data:2},
            {data:3, className:"text-center"},
            {data:4, className:"text-center"},
            {data:5, orderable:false, searchable:false, className:"text-center"},
        ],
        order:[[0,'asc']],
        pageLength:10,
        responsive:true,
        autoWidth:false,
        language:{
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        },
        drawCallback:function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    });

 })









</script>