<?php
$title="Lorem ipsum | LogIn";
// Traigo las funciones que controlan mi sistema de Registro y Login
require_once 'register-controller.php';

if ($_POST) {

  $emailInPost = trim($_POST['email']);

  $errorsInLogIn = logInValidate();

  if (!$errorsInLogIn) {
    session_start();
    $user = getUserData($emailInPost);

    var_dump($user);
    // $_SESSION('user') = $user['name'];
    // $_SESSION('email') = $user['email'];
    // $_SESSION('img') = $user['imgProfile'];

    header('location: index.php');
    exit;
  }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>

    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
      <div class="mainContainer">
        <div class="col-12 col-md-8 col-xl-6 justify-content-center">
          <!-- EMPIEZA FORMULARIO -->
          <form class="" method="post">
          <!-- CONTENEDOR CAMPOS A COMPLETAR -->
          <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Ingresar Email" name="email" value="<?= isset($emailInPost) ? $emailInPost : ''; ?> " required>

            <!-- MENSAJE ERROR MAIL -->
            <?php if ( isset($errorsInLogIn['inEmail']) ) : ?>
            <div class="alert alert-danger">
              <?= $errorsInLogIn['inEmail'] ?>
            </div>
            <?php endif; ?>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Ingresar Contraseña" name="psw" required>

            <!-- MENSAJE ERROR PASS -->
            <?php if ( isset($errorsInLogIn['inPsw']) ) : ?>
            <div class="alert alert-danger">
              <?= $errorsInLogIn['inPsw'] ?>
            </div>
            <?php endif; ?>

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
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
