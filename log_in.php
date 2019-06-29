<?php
$title="Lorem ipsum | LogIn";
// Traigo las funciones que controlan mi sistema
require_once 'controller-general.php';

//Verificamos si esta logeado y si lo esta lo direccionamos al Perfil
if ( isLogged() ) {
  header('location: perfil.php');
  exit;
}

if ($_POST) {

  $emailOrUserInPost = trim($_POST['emailOrUser']);

  $errorsInLogIn = logInValidate();

  if (!$errorsInLogIn) {
    //seteamos la cookie si tiene Recordarme
    if (isset($_POST['remember'])) {
      setcookie("user",$emailOrUserInPost,time()+60*60*24*30);
    }

    //Logeamos al usuario
    login(getUserData($emailOrUserInPost));
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
            <label for="emailOrUser"><b>Email o Usuario</b></label>
            <input type="text" placeholder="Ingresar Email o Usuario" name="emailOrUser" value="<?= isset($emailOrUserInPost) ? $emailOrUserInPost : ''; ?>" style="<?= isset($errorsInLogIn['inEmailUser']) ? 'border: solid 1.5px #BD3131;' : '' ?> " required>
            <!-- MENSAJE ERROR MAIL USER -->
            <?php if ( isset($errorsInLogIn['inEmailUser']) ) : ?>
            <div class="alert alert-danger">
              <?= $errorsInLogIn['inEmailUser'] ?>
            </div>
            <?php endif; ?>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Ingresar Contraseña" name="psw" style="<?= isset($errorsInLogIn['inPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> " required>
            <!-- MENSAJE ERROR PASS -->
            <?php if ( isset($errorsInLogIn['inPsw']) ) : ?>
            <div class="alert alert-danger">
              <?= $errorsInLogIn['inPsw'] ?>
            </div>
            <?php endif; ?>
            <span class="psw">
              <a class="btn btn-light" href="#">OLVIDÉ MI CONTRASEÑA</a>
            </span>
            <label>
              <input type="checkbox" checked="checked" name="remember" value="ok"> Recordarme
            </label>


          </div>

          <!-- CONTENEDOR BOTON CANCEL -->
          <div class="container btnForm">
            <button class="btn-secondary volver" type="button">Volver</button>
            <button class="btn-primary" type="submit">Ingresar</button>
          </div>
          <div class="container btnForm">
            <a class="btn btn-secondary btn-block reg" href="register.php">Aún no tengo cuenta</a>
          </div>
        </form>
        <!-- TERMINA FORMULARIO -->
        </div>
      </div>
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
