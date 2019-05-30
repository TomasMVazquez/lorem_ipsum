<?php $title="Lorem ipsum | LogIn"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>

    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
    <br>
    <div class="containerLogIn">
      <!-- EMPIEZA FORMULARIO -->
      <form action="index.php">
        <!-- CONTENEDOR IMAGEN AVATAR -->
        <div class="imgcontainer">
          <img src="imgs/img_avatar4.png" alt="Avatar" class="avatar">
        </div>

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
            <a class="btn  btn-light" href="#">Recuperar Contraseña</a>
          </span>

        </div>

        <!-- CONTENEDOR BOTON CANCEL -->
        <div class="container btnForm">
          <button class="cancelbtn" type="button">Cancel</button>
          <button class="btnLogin" type="submit">Ingresar</button>
        </div>
        <span class="psw">
          <a class="btn btn-link" href="register.php">Aún no tengo cuenta</a>
        </span>
      </form>
      <!-- TERMINA FORMULARIO -->
    </div>
    <br>
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
