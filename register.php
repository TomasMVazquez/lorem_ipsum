<?php
  $title="Lorem ipsum | Registro";
  $categorias = ["Maquillajes","Labiales","Shampoos","Cremas"];
  $notificaciones = ["noticias","promociones"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- ACA PONER INCLUDE HEADER -->

    <div class="containerRegister">
      <!-- EMPIEZA FORMULARIO -->
      <div class="container registerHeader">
        <h1>Registro</h1>
        <header>
          Favor de completar el formulario para crear una cuenta
        </header>
      </div>

      <form action="index.php" >
        <div class="container">

          <label for="name"><b>Nombre</b></label>
          <input type="text" placeholder="Ingresar Nombre" name="name" required>

          <label for="lastName"><b>Apellido</b></label>
          <input type="text" placeholder="Ingresar Apellido" name="lastName" required>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Ingresar Email" name="email" required>

          <label for="address"><b>Dirección</b></label>
          <input type="text" placeholder="Ingresar Dirección" name="address" required>

          <label for="city"><b>Ciudad</b></label>
          <input type="text" placeholder="Ingresar Ciudad" name="city" required>

          <!-- SWITCH PARA QUE QUIERO VER -->
          <div class="container containerSwitch">
            <?php foreach ($categorias as $unaCategoria) : ?>
              <div class="containerUnSwitchCat col-6">
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
                <em><?= $unaCategoria ?></em>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- SWITCH PARA QUE QUIERO RECIBIR -->
          <div class="container containerSwitch">
            <?php foreach ($notificaciones as $unaNotificacion) : ?>
              <div class="containerUnSwitchNot col-12">
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
                <em>Quiero recibir <?= $unaNotificacion ?></em>
              </div>
            <?php endforeach; ?>
          </div>

          <label for="psw"><b>Contraseña</b></label>
          <input type="password" placeholder="Ingresar Contraseña" name="psw" required>

          <label for="psw-repeat"><b>Repetir Contraseña</b></label>
          <input type="password" placeholder="Repetir Contraseña" name="psw-repeat" required>

          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Recordarme
          </label>


          <p>Al crearse una cuenta, usted acepta nuestros <a href="#" style="color:dodgerblue">Terminos & Condiciones</a>.</p>
          <div class="btnForm">
            <button class="cancelbtn" type="button" >Cancel</button>
            <button class="btnLogin" type="submit">Sign Up</button>
          </div>
        </div>
      </form>
      <!-- TERMINA FORMULARIO -->
    </div>

    <!-- ACA PONER INCLUDE FOOTER -->
  </body>
</html>
