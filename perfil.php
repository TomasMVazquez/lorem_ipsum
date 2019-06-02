<?php
$title="Lorem ipsum | Perfil";
$profile = [
  "name" => "Fulano",
  "lastName" => "DeTal",
  "email" => "fulanodetal@gmail.com",
  "address" => "calle false 123",
  "city" => "Springfield",
  "categorias" => [
    "Maquillajes" => true,
    "Labiales" => false,
    "Shampoos" => true,
    "Cremas" => false
  ],
  "notificaciones" => [
    "noticias" => false
  ],
  "favoritos" => []
]
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>
    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
    <br>
    <div class="containerProfile">
      <!-- COMIENZA EL PROFILE -->
      <div class="row">
        <!-- COSTADO CON EL PROFILE -->
        <aside class="containerAside col-12 col-md-6 col-lg-4">
          <div class="aside">
            <!-- CONTENEDOR IMAGEN AVATAR -->
            <div class="imgContainerProfile">
              <h1>Bienvenid@ <?= $profile["name"] ?></h1>
              <a href="#">
                <img src="imgs/img_avatar4.png" alt="Avatar" class="avatar">
              </a>
            </div>
            <!-- FIN CONTENEDOR IMAGEN AVATAR -->
            <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
            <form class="profile" action="" >
              <div class="container">

                <label for="name"><b>Nombre</b></label>
                <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= $profile["name"] ?>" required>

                <label for="lastName"><b>Apellido</b></label>
                <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= $profile["lastName"] ?>" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Ingresar Email" name="email" value="<?= $profile["email"] ?>" required>

                <!-- SWITCH PARA QUE QUIERO VER -->
                <div class="container containerSwitch">
                  <?php foreach ($profile["categorias"] as $unaCategoria => $value) : ?>
                    <div class="containerUnSwitch col-12">
                      <label class="switch">
                        <input type="checkbox"
                        <?php if ($value) : ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                      </label>
                      <em class="switchText"><?= $unaCategoria ?></em>
                    </div>
                  <?php endforeach; ?>
                </div>
                <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                <div class="container containerSwitch">
                  <?php foreach ($profile["notificaciones"] as $unaNotificacion => $value) : ?>
                    <div class="containerUnSwitch col-12">
                      <label class="switch">
                        <input type="checkbox" <?php if ($value) : ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                      </label>
                      <em class="switchText">Quiero recibir <?= $unaNotificacion ?></em>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="btnForm">
                  <button class="btn-primary" type="submit">Actualizar</button>
                </div>
              </div>
            </form>
          </div>
        </aside>
        <!-- MAIN CON LOS FAVORITOS -->
        <main class="containerMain col-12 col-md-6 col-lg-8">
          <div class="main">
            <hr>
            <div class="container">
              <h2>Estos son tus favoritos</h2>
            </div>
            <hr>
            <!-- TARJETAS FAVORITOS -->
            <div class="col-12 justify-content-center">
              <div class="card">
                <div class="tituloCardFav">
                  <h3 class="card-title">Card title</h3>
                  <div class="corazon">
                    <i class="far fa-heart"></i>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-4">
                    <img src="imgs/items/1.jpg" class="card-img" alt="...">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="buttonsCard">
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--FIN TARJETAS FAVORITOS -->
          </div>
        </main>
      </div>
      <!-- TERMINA EL PROFILE -->
    </div>
    <br>
    <?php require_once("includes/footer.php") ?>
    <!-- ACA PONER INCLUDE FOOTER -->
  </body>
</html>
