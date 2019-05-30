<?php
  $menu = [
    "Quienes Somos" => "nosotros.php",
    "Productos" => "productos.php",
    "Faqs" => "faq.php",
    "Logueate" => "log_in.php",
    "Contacto" => "contacto.php"
  ]
 ?>

    <header class="bg-light">

      <nav class="col-12 col-md-10 navbar navbar-expand-md navbar-light">
        <!-- Brand -->

        <a class="navbar-brand" href="#"><img src="imgs/logo.png" alt=""> </a>

        <div class="mainHeader">

          <ul class="socialMedia">

            <li><a href="http://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="http://www.instagram.com"><i class="fab fa-instagram m-1"></i></a></li>
            <li><a href="#"><i class="fas fa-user"></i></a></li>
            <!--<li class="loginBtn"><div class="btn btn-info ml-3"> ¡INGRESA!</div></li>-->
          </ul>



          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav text-center">
              <?php foreach ($menu as $boton => $seccion): ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $seccion?>"><?php echo $boton ?></a></li>                </li>
              <?php endforeach; ?>


              <!-- Dropdown
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Productos
                </a>
                <div class="dropdown-menu  text-center">
                  <a class="dropdown-item" href="#">Cat 1</a>
                  <a class="dropdown-item" href="#">Cat 2</a>
                  <a class="dropdown-item" href="#">Cat 3</a>
                </div>
              </li> -->

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
