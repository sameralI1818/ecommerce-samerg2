<div class="content-wrapper" style="min-height: 1504.06px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Administradores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Administradores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php

      if(!empty($arrayRutas[2])){

        if(
          $arrayRutas[2] == "listado" ||
          $arrayRutas[2] == "creacion" ||
          $arrayRutas[2] == "editar"
        ){
          include "modulos/".$arrayRutas[2].".php";
        }
        else{
          echo '<script>
              window.location= "'.$path.'404";
            </script>';
        }
      }else{
        include "modulos/listado.php";
      }

    ?>

  </div>