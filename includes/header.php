<?php
  $menu = [
    "Quienes Somos" => "index.php",
    "Productos" => [
      "Categoria A" => "cosmetica1.php",
      "Categoria B" => "cosmetica2.php",
    ],
    "Faqs" => "faqs.php",
    "Logueate" => "log_in.php",
    "Contacto" => "#contacto-aqui",
    "Novedades" => [
      "Eventos" => "cosmetica1.php",
      "Lanzamientos" => "cosmetica2.php",
    ],
  ]
 ?>

    <header class="bg-dark">



      <nav class="col-12 col-md-10 navbar navbar-expand-md navbar-dark">

        <!-- Marca - La puse en texto - Habría que modificarla -->
        <a class="navbar-brand" href="#">
        <img src="imgs/logo-loremipsum.png" alt="">
      </a>

        <div class="mainHeader">

          <div class="perfilHeader">

            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Bienvenido Fulanito</a>
              <div class="dropdown-menu ">
                <a class="dropdown-item" href="#">Modificar tu cuenta</a>
                <a class="dropdown-item" href="#">Ver Favoritos</a>
                <a class="dropdown-item" href="#">Cambiar tu foto de perfil</a>
              </div>
            </div>
            <img src="imgs/img_avatar4.png" alt="">

          </div>

          <!--<ul class="socialMedia">

            <li><a href="http://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="http://www.instagram.com"><i class="fab fa-instagram m-1"></i></a></li>
            <li><a href="#"><i class="fas fa-user"></i></a></li>

          </ul>-->

          <!-- Toggler / Menu hamburguesa -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links con submenu -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <?php foreach ($menu as $boton => $seccion): ?>

                <?php if (is_array($seccion)): ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      <?= $boton ?>
                    </a>

                    <div class="dropdown-menu  text-center">
                      <?php foreach ($seccion as $suboton => $subseccion): ?>
                      <a class="dropdown-item" href="<?= $subseccion?>"><?= $suboton ?></a>
                      <?php endforeach; ?>
                    </div>
                  </li>

                  <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $seccion?>"><?= $boton ?></a></li>

                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
