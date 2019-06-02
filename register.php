<?php
  $title="Lorem ipsum | Registro";
  $categorias = ["Maquillajes","Labiales","Shampoos","Cremas","Maquillajes","Labiales","Shampoos","Cremas"];
  $notificaciones = ["noticias"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>
    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
    <br>
    <div class="mainContainer">
      <!-- TITULO DE LA PAG -->
      <div class="col-12 col-md-11 col-xl-10">
        <h1 class="titulo">Registro</h1>
        <p>
          Favor de completar el formulario para crear una cuenta
        </p>
      </div>
      <!-- FIN TITULO DE LA PAG -->
    </div>

    <div class="mainContainer">
        <!-- EMPIEZA FORMULARIO -->
        <form class="col-12 col-md-11 col-xl-10" action="index.php" >
          <div class="container containerRegister">
            <!-- CONTENEDOR IMAGEN AVATAR -->
            <div class="imgcontainer col-12 col-md-4 col-xl-4">
              <label for="avatar"><b>Imagen de Perfil</b></label>
              <a href="#">
                <img src="imgs/img_avatar4.png" alt="Avatar" class="avatar">
              </a>
            </div>
            <!-- FIN CONTENEDOR IMAGEN AVATAR -->
            <div class="container col-12 col-md-8 col-xl-8">
              <label for="name"><b>Nombre</b></label>
              <input type="text" placeholder="Ingresar Nombre" name="name" required>

              <label for="lastName"><b>Apellido</b></label>
              <input type="text" placeholder="Ingresar Apellido" name="lastName" required>

              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Ingresar Email" name="email" required>

            </div>
          </div>
          <hr>
          <div class="">
            <div class="col-12">
              <!-- SWITCH PARA QUE QUIERO VER -->
              <label for="categorias"><b>Categorias</b></label>
              <div class="container containerSwitch">
                <?php if (count($categorias)>5): ?>
                  <?php foreach ($categorias as $unaCategoria) : ?>
                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-4">
                      <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label>
                      <em><?= $unaCategoria ?></em>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <?php foreach ($categorias as $unaCategoria) : ?>
                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-6">
                      <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label>
                      <em class="switchText"><?= $unaCategoria ?></em>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <!-- FIN SWITCH PARA QUE QUIERO VER -->
              <!-- SWITCH PARA QUE QUIERO RECIBIR -->
              <div class="container containerSwitch">
                <?php foreach ($notificaciones as $unaNotificacion) : ?>
                  <div class="containerUnSwitchNot col-12">
                    <label class="switch">
                      <input type="checkbox" checked>
                      <span class="slider round"></span>
                    </label>
                    <em class="switchText">Quiero recibir <?= $unaNotificacion ?></em>
                  </div>
                <?php endforeach; ?>
              </div>
              <!-- FIN SWITCH PARA QUE QUIERO RECIBIR -->
            </div>
            <hr>
            <div class="container col-12 col-md-12 col-xl-8">
              <label for="psw"><b>Contraseña</b></label>
              <input type="password" placeholder="Ingresar Contraseña" name="psw" required>

              <label for="psw-repeat"><b>Repetir Contraseña</b></label>
              <input type="password" placeholder="Repetir Contraseña" name="psw-repeat" required>

              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Recordarme
              </label>

              <p>
                Al crearse una cuenta, usted acepta nuestros
                <a href="#" style="color:dodgerblue">Terminos & Condiciones</a>
                .
              </p>
            </div>
          </div>

          <div class="container">
            <div class="btnForm">
              <button class="btn-secondary volver" type="button" >Volver</button>
              <button class="btn-primary" type="submit">Registrar</button>
            </div>
          </div>

        </form>
        <!-- TERMINA FORMULARIO -->
    </div>
    <br>
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
