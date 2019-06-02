<?php $title="Lorem ipsum | LogIn"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>

    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
    <br>
    <div class="mainContainer justify-content-center">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-xl-6 justify-content-center">
          <!-- EMPIEZA FORMULARIO -->
          <form class="" action="index.php">
          <!-- CONTENEDOR CAMPOS A COMPLETAR -->
          <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Ingresar Email" name="email" required>

            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Ingresar Contraseña" name="pass" required>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Recordarme
            </label>
            <span class="psw">
              <a class="btn btn-light" href="#">Recuperar Contraseña</a>
            </span>

          </div>

          <!-- CONTENEDOR BOTON CANCEL -->
          <div class="container btnForm">
            <button class="btn-secondary volver" type="button">Volver</button>
            <button class="btn-primary" type="submit">Ingresar</button>
          </div>
          <span class="psw">
            <a class="btn btn-light" href="register.php">Aún no tengo cuenta</a>
          </span>
        </form>
        <!-- TERMINA FORMULARIO -->
        </div>
      </div>
    </div>
    <br>
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
