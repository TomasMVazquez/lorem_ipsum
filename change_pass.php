<?php

$title="Lorem ipsum | Modificar Contraseña";

require_once 'controller-general.php';

if ($_POST) {

  $pswInPost = trim($_POST['newPsw']);
  $pswRepeatInPost = trim($_POST['newPsw-repeat']);

  $errorsInRepass = validateModifyPass();


      if(!validateModifyPass()){

        updatePass();
        header('location: perfil.php');
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
      <!-- TITULO DE LA PAG -->
      <div class="col-12 col-md-11 col-xl-10">
        <h1 class="titulo">Cambiar Contraseña</h1>
        <p>

        </p>
      </div>
      <!-- FIN TITULO DE LA PAG -->
    </div>

    <div class="mainContainer">
        <!-- EMPIEZA FORMULARIO -->
        <form class="col-12 col-md-12 col-lg-6" method="post" enctype="multipart/form-data">
          <div class="container change_pass">

<!--Acá va el form de pass anterior-->
            <div class="container col-12 col-md-12 col-lg-8">
             <label for="psw"><b>Contraseña anterior</b></label>
             <input type="password" placeholder="Ingresar Contraseña" name="psw" style="<?= isset($errorsInRepass['inOldPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> " >
<!-- MENSAJE ERROR PASS-            -->
             <?php if ( isset($errorsInRepass['inOldPsw']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsInRepass['inOldPsw']; ?>
              </div>
             <?php endif; ?>


          </div>

<!--desde acá va el formulario de contraseña nueva -->
              
          <div class="container col-12 col-md-12 col-lg-8">
              <label for="psw"><b>Nueva contraseña</b></label>
              <input type="password" placeholder="Ingresar nueva contraseña" name="newPsw" style="<?= isset($errorsInRepass['inNewPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores de pass -->
              <?php if ( isset($errorsInRepass['inNewPsw']) ) : ?>
                <div class="alert alert-danger">
                  <?= $errorsInRepass['inNewPsw']; ?>
                </div>
              <?php endif; ?>

              <label for="psw-repeat"><b>Repetir contraseña</b></label>
              <input type="password" placeholder="Repetir nueva contraseña" name="newPsw-repeat" style="<?= isset($errorsInRepass['inRepeatPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- manejo de errores de repetir pass -->
              <?php if ( isset($errorsInRepass['inRepeatPsw']) ) : ?>
                <div class="alert alert-danger">
                  <?= $errorsInRepass['inRepeatPsw']; ?>

                </div>
              <?php endif; ?>
            </div>
        </div>
          <div class="container">
            <div class="btnForm flex-row-reverse">
              <button class="btn btn-primary col-6" type="submit">Guardar Cambios</button>
              <a class="btn btn-secondary volver"  href="perfil.php">Volver</a>
            </div>
          </div>

        </form>
        <!-- termina el form -->
    </div>
    <!-- Acá va el FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
