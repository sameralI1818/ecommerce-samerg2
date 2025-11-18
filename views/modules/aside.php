  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="views/sources/adminlte/index3.html" class="brand-link">
      <img src="<?=$path?>views/sources/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$path?>views/sources/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"><?= $_SESSION['admin_nombre'] ;?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Administradores -->
          <li class="nav-item">
            <a href="/admin/administradores" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "administradores"):?> active <?php endif ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Administradores
              </p>
            </a>
          </li>

          <!-- Dashboard -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link <?php if(empty($arrayRutas[1]) || !empty($arrayRutas[1]) && $arrayRutas[1] === "dashboard"):?> active <?php endif ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Productos -->
          <li class="nav-item <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['categorias','subcategorias','inventario','mensajes'])):?> menu-open <?php endif ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
                <span class="right badge badge-warning">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/categorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "categorias"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/subcategorias" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "subcategorias"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcategorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/inventario" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "inventario"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mensajes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "mensajes"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mensajes
                    <span class="right badge badge-danger">3</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Ventas -->
          <li class="nav-item <?php if(!empty($arrayRutas[1]) && in_array($arrayRutas[1],['pedidos','informes','disputas'])):?> menu-open <?php endif ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-funnel-dollar"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
                <span class="right badge badge-warning">8</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/pedidos" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "pedidos"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos
                    <span class="right badge badge-success">5</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/informes" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "informes"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/disputas" class="nav-link <?php if(!empty($arrayRutas[1]) && $arrayRutas[1] === "disputas"):?> active <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disputas

                    <span class="right badge badge-danger">3</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>


      

          <!-- Cerrar Sesión -->
          <li class="nav-item">
            <a href="/salir" class="nav-link bg-danger">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>