<?php
  $title="Lorem ipsum | Registro";

  $categorias = ["Maquillajes","Labiales","Shampoos","Cremas","Mascaras","Tonificadores","Algo","Otros"];
  $notificaciones = ["noticias"];

  // Traigo las funciones que controlan mi sistema de Registro Login y Perfil
  require_once 'register-controller.php';

  if ($_POST) {

    $nameInPost = trim($_POST['name']);
    $lastNameInPost = trim($_POST['lastName']);
    $emailInPost = trim($_POST['email']);
    $pswInPost = trim($_POST['psw']);
    $pswRepeatInPost = trim($_POST['psw-repeat']);


    $errorsRegister = registerValidate();

    if (!$errorsRegister) {
      if ($_FILES['avatar']['name']!='') {
        $imgName = saveImage($_FILES['avatar']);
        $_POST['imgProfile'] = $imgName;

      }else {
        $_POST['imgProfile'] = 'imgs/img_avatar4.png';
      }

      saveUser();

      $_SESSION = getUserData($emailInPost);

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
        <form class="col-12 col-md-11 col-xl-10" method="post" enctype="multipart/form-data">
          <div class="container containerRegister">
            <!-- CONTENEDOR IMAGEN AVATAR -->
            <div class="imgcontainer col-12 col-md-4 col-xl-4">
              <label for="avatar"><b>Imagen de Perfil</b>
                <img src="imgs/img_avatar4.png" alt="Avatar" class="avatar" style="cursor:pointer">
              </label>
              <input id="avatar" type="file" name="avatar" class="custom-file-input">
              <?php if ( isset($errorsRegister['inAvatar']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsInRegister['inAvatar']; ?>
								</div>
							<?php endif; ?>
            </div>
            <!-- FIN CONTENEDOR IMAGEN AVATAR -->
            <div class="container col-12 col-md-8 col-xl-8">
              <label for="name"><b>Nombre</b></label>
              <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= isset($nameInPost) ? $nameInPost : ''; ?>">

              <label for="lastName"><b>Apellido</b></label>
              <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= isset($lastNameInPost) ? $lastNameInPost : ''; ?>">

              <?php if ( isset($errorsRegister['inName']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inName'] ?>
              </div>
              <?php endif; ?>

              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Ingresar Email" name="email" value="<?= isset($emailInPost) ? $emailInPost : ''; ?>">

              <?php if ( isset($errorsRegister['inEmail']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inEmail'] ?>
              </div>
              <?php endif; ?>

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
                        <input type="checkbox" name="categorias[]" value="<?= $unaCategoria ?>" checked>
                        <span class="slider round"></span>
                      </label>
                      <em><?= $unaCategoria ?></em>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <?php foreach ($categorias as $unaCategoria) : ?>
                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-6">
                      <label class="switch">
                        <input type="checkbox" name="categorias[]" value="<?= $unaCategoria ?>" checked>
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
                      <input type="checkbox" name="notificaciones[]" value="<?= $unaNotificacion ?>" checked>
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
              <input type="password" placeholder="Ingresar Contraseña" name="psw">

              <?php if ( isset($errorsRegister['inPsw']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPsw']; ?>
								</div>
							<?php endif; ?>

              <label for="psw-repeat"><b>Repetir Contraseña</b></label>
              <input type="password" placeholder="Repetir Contraseña" name="psw-repeat">

              <?php if ( isset($errorsRegister['inPswRepeat']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPswRepeat']; ?>
								</div>
							<?php endif; ?>

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
    <!-- ACA PONER INCLUDE FOOTER -->
    <?php require_once("includes/footer.php") ?>
  </body>
</html>
