<div class="container py-2 py-lg-4">

  <div class="row">


 

    <div class="col-12 col-lg-2 mt-1">

      <div class="d-flex justify-content-center">

        <a href="home" class="navbar-brand">

          <img src="views/sources/img/template/logo.png" alt="" class="brand-image img-fluid py-3 px-5 p-lg-0 pe-lg-3">

        </a>

      </div>

    </div>


 

    <div class="col-12 col-lg-7 col-xl-8 mt-1 px-3 px-lg-0">

      <?php
          if(isset($_SESSION['admin'])) : 
      ?>

      <a href="#" data-widget="pushmenu" role="button" class="nav-link float-start"> <i class="fas fa-bars"></i></a>

        <?php 
          endif;
        ?>
 

      <!-- Dropdown -->

      <div class="dropdown px-1 float-start bg-info">

        

        <a href="#" id="dropdownSubMenu1" class="nav-link dropdown-toggle text-uppercase" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


 

          <span class="d-lg-block d-none">Categoria <i class="ps-lg-2 fas fa-th-list"></i></span>


 

          <span class="d-lg-none d-block"><i class="fas fa-th-list"></i></span>

        </a>


 

        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">


 

          <!-- Ropa -->

          <li class="dropdown-submenu dropdown-hover">

            <a href="#" id="dropdownSubMenu2" class="dropdown-item dropdown-toggle text-uppercase" role="button" data-toggle="dropdown" aria-haspopup="true" aria-extended="false">

              <i class="fas fa-tshirt pe-2 fa-xs"></i>Ropa

            </a>


 

            <ul class="border-0 shadow py-3 ps-3 d-block d-lg-none">

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Ropa para dama</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Ropa para hombre</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Ropa deportiva</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Ropa infantil</a>

              </li>


 

            </ul>


 

            <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownSubMenu2">

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Ropa para dama</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Ropa para hombre</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Ropa deportiva</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Ropa infantil</a>

              </li>

            </ul>



 

          </li>

        

          <!-- Calzado -->

          <li class="dropdown-submenu dropdown-hover">

            <a href="#" id="dropdownSubMenu2" class="dropdown-item dropdown-toggle text-uppercase" role="button" data-toggle="dropdown" aria-haspopup="true" aria-extended="false">

              <i class="fas fa-shoe-prints pe-2 fa-xs"></i>Calzado

            </a>


 

            <ul class="border-0 shadow py-3 ps-3 d-block d-lg-none">

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Calzado para dama</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Calzado para hombre</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Calzado deportiva</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Calzado infantil</a>

              </li>


 

            </ul>


 

            <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownSubMenu2">

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Calzado para dama</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Calzado para hombre</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Calzado deportiva</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Calzado infantil</a>

              </li>

            </ul>



 

          </li>


 

          <!-- Tecnologías -->

          <li class="dropdown-submenu dropdown-hover">

            <a href="#" id="dropdownSubMenu2" class="dropdown-item dropdown-toggle text-uppercase" role="button" data-toggle="dropdown" aria-haspopup="true" aria-extended="false">

              <i class="fas fa-laptop pe-2 fa-xs"></i>Tecnología

            </a>


 

            <ul class="border-0 shadow py-3 ps-3 d-block d-lg-none">

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Tecnología móvil</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Tabletas electrónicas</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Computadoras</a>

              </li>

              <li>

                <a tabindex="-1" href="#" class="dropdown-item">Auriculares</a>

              </li>


 

            </ul>


 

            <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownSubMenu2">

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Tecnología móvil</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Tabletas electrónicas</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">computadoras</a>

              </li>

              <li>

                <a href="#" tabindex="-1" class="dropdown-item">Auriculares</a>

              </li>

            </ul>



 

          </li>


 

        </ul>


 

      </div>


 

      <!-- buscador -->

      <form class="form-inline">

        <div class="input-group w-100 me-0 me-lg-4">

          <input type="search" class="form-control rounded-0 p-3 pe-5" placeholder="Buscar..." style="height:40px">

          <div class="input-group-append px-2 bg-info">

            <button class="btn btn-navbar text-white" type="submit">

              <i class="fas fa-search"></i>

            </button>

          </div>

        </div>

      </form>

    

    </div>


 

    <!-- cesta -->

    <div class="col-12 col-lg-3 col-xl-2 mt-1 px-3 px-lg-0">

      <div class="my-2 my-lg-0 d-flex justify-content-center">

        

        <a href="#">

          <button class="btn btn-default float-start rounded-0 border-0 py-2 px-3 bg-info">

            <i class="fa fa-shopping-cart"></i>

          </button>

        </a>


 

        <div class="small border float-start ps-2 pe-5 w-100">

          TU CESTA <span>0</span><br> USD $ <span>0</span>

        </div>


 

      </div>

    </div>


 

  </div>

</div>