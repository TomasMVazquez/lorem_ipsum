<?php

$title="Lorem ipsum | Modificar Contraseña";

require_once 'controller-general.php';

if ($_POST) {

  $pswInPost = trim($_POST['psw']);
  $pswRepeatInPost = trim($_POST['psw-repeat']);
  $errorsRegister = registerValidate();
        saveUser();

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
        <form class="col-12 col-md-12 col-xl-8" method="post" enctype="multipart/form-data">
          <div class="container change_pass">

<!--Acá va el form de pass anterior-->
            <div class="container col-12 col-md-12 col-xl-8">
             <label for="psw"><b>Contraseña anterior</b></label>
             <input type="password" placeholder="Ingresar Contraseña" name="psw" style="<?= isset($errorsInLogIn['inPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> " required>
<!-- MENSAJE ERROR PASS-            -->
             <?php if ( isset($errorsInLogIn['inPsw']) ) : ?>
             <div class="alert alert-danger">
             <?= $errorsInLogIn['inPsw'] ?>
             </div>
             <?php endif; ?>


<!--desde acá va el formulario de contraseña nueva -->
              <div class="container col-12 col-md-12 col-xl-8">
              <label for="psw"><b>Nueva contraseña</b></label>
              <input type="password" placeholder="Ingresar Contraseña" name="psw" style="<?= isset($errorsRegister['inPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores de pass -->
              <?php if ( isset($errorsRegister['inPsw']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPsw']; ?>
								</div>
							<?php endif; ?>

              <label for="psw-repeat"><b>Repetir contraseña</b></label>
              <input type="password" placeholder="Repetir Contraseña" name="psw-repeat" style="<?= isset($errorsRegister['inPswRepeat']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- manejo de errores de repetir pass -->
              <?php if ( isset($errorsRegister['inPswRepeat']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPswRepeat']; ?>
								</div>
							<?php endif; ?>
            </div>
          </div>
        </div>
          <div class="container">
            <div class="btnForm">
              <button class="btn-secondary volver" type="button" >Volver</button>
              <button class="btn-primary" type="submit">Guardar Cambios</button>
            </div>
          </div>

        </form>
        <!-- termina el form -->
    </div>
    <!-- Acá va el FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
