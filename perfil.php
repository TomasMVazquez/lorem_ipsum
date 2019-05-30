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
    "noticias" => false,
    "promociones"=> true
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
      <div class="row no-gutters">
        <!-- COSTADO CON EL PROFILE -->
        <aside class="containerAside col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="aside">
            <h1>Bienvenid@ <?= $profile["name"] ?></h1>
            <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
            <form action="" >
              <div class="container">

                <label for="name"><b>Nombre</b></label>
                <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= $profile["name"] ?>" required>

                <label for="lastName"><b>Apellido</b></label>
                <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= $profile["lastName"] ?>" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Ingresar Email" name="email" value="<?= $profile["email"] ?>" required>

                <label for="address"><b>Dirección</b></label>
                <input type="text" placeholder="Ingresar Dirección" name="address" value="<?= $profile["address"] ?>" required>

                <label for="city"><b>Ciudad</b></label>
                <input type="text" placeholder="Ingresar Ciudad" name="city" value="<?= $profile["city"] ?>" required>

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
                  <button class="btnEdit" type="submit">Actualizar</button>
                </div>
              </div>
            </form>
          </div>
        </aside>
        <!-- MAIN CON LOS FAVORITOS -->
        <main class="containerMain col-12 col-sm-12 col-md-6 col-lg-8">
          <div class="main">
            <div class="container">
              <h2>Estos son tus favoritos</h2>
            </div>
            <div class="container boxFav">
              <div class="boxUnFav">
                boxUnFav
              </div>
              <div class="boxUnFav">
                boxUnFav
              </div>
              <div class="boxGranFav">
                boxGranFav
              </div>
            </div>
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
