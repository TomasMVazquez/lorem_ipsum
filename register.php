<?php
  $title="Lorem ipsum | Registro";
  // Traigo las funciones que controlan mi sistema
  require_once 'controller-general.php';

  //Verificamos si esta logeado y si lo esta lo direccionamos al Perfil
  if ( isLogged() ) {
    header('location: perfil.php');
    exit;
  }

  //Buscamos los paises en la API
  $paises = file_get_contents('https://restcountries.eu/rest/v2/all');
  //Los pasamos a un array
  $arrayPaises = json_decode($paises,true);

  //Creamos las categorias
  $categorias = ["Maquillajes","Labiales","Shampoos","Cremas","Mascaras","Tonificadores","Algo","Otros"];
  $notificaciones = ["noticias"];

  //Verificamos el POST
  if ($_POST) {

    $userInPost = trim($_POST['user']);
    $nameInPost = trim($_POST['name']);
    $lastNameInPost = trim($_POST['lastName']);
    $emailInPost = trim($_POST['email']);
    $countryInPost = $_POST['pais'];
    if (isset($_POST['categorias'])) {
      $categoriasInPost = $_POST['categorias'];
    }
    if (isset($_POST['notificaciones'])) {
      $notifInPost = $_POST['notificaciones'];
    }
    $pswInPost = trim($_POST['psw']);
    $pswRepeatInPost = trim($_POST['psw-repeat']);

    //Revisamos si hay errores
    $errorsRegister = registerValidate();

    //Si no hay errores
    if (!$errorsRegister) {
      //Revisamos la imagen
      if ($_FILES['avatar']['name']!='') {
        $imgName = saveImage($_FILES['avatar']);
        $_POST['imgProfile'] = $imgName;
      }else {
        // La imagen de perfil como no es obligatoria dejamos la imagen dummy
        $_POST['imgProfile'] = 'imgs/img_avatar4.png';
      }

      //seteamos la cookie si tiene Recordarme
      if (isset($_POST['remember'])) {
        setcookie("user",$userInPost,time()+60*60*24*30);
      }
      //Guardamos el usuario en nuestro Json
      saveUser();
      //Logeamos al usuario
      login(getUserData($emailInPost));
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
              <!-- Manejo de errores en la imagen -->
              <?php if ( isset($errorsRegister['inAvatar']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsInRegister['inAvatar']; ?>
								</div>
							<?php endif; ?>
            </div>
            <!-- FIN CONTENEDOR IMAGEN AVATAR -->
            <div class="container col-12 col-md-8 col-xl-8">
              <label for="user"><b>Usuario</b></label>
              <input type="text" placeholder="Ingresar Usuario" name="user" value="<?= isset($userInPost) ? $userInPost : ''; ?>" style="<?= isset($errorsRegister['inUser']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores usuario -->
              <?php if ( isset($errorsRegister['inUser']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inUser'] ?>
              </div>
              <?php endif; ?>

              <label for="name"><b>Nombre</b></label>
              <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= isset($nameInPost) ? $nameInPost : ''; ?>" style="<?= isset($errorsRegister['inName']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores Nombre-->
              <?php if ( isset($errorsRegister['inName']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inName'] ?>
              </div>
              <?php endif; ?>

              <label for="lastName"><b>Apellido</b></label>
              <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= isset($lastNameInPost) ? $lastNameInPost : ''; ?>" style="<?= isset($errorsRegister['inLastName']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores apellido -->
              <?php if ( isset($errorsRegister['inLastName']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inLastName'] ?>
              </div>
              <?php endif; ?>

              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Ingresar Email" name="email" value="<?= isset($emailInPost) ? $emailInPost : ''; ?>" style="<?= isset($errorsRegister['inEmail']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores Email -->
              <?php if ( isset($errorsRegister['inEmail']) ) : ?>
              <div class="alert alert-danger">
                <?= $errorsRegister['inEmail'] ?>
              </div>
              <?php endif; ?>

              <label for="pais"><b>País</b></label>
              <select class="custom-select" name="pais" style="<?= isset($errorsRegister['inCountry']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
                <option value="">Seleccionar país</option>
                <?php foreach ($arrayPaises as $pais): ?>
                  <?php if (isset($countryInPost) && $countryInPost == $pais["alpha2Code"]): ?>
                    <option value="<?= $pais["alpha2Code"] ?>" selected ><?= $pais["name"] ?></option>
                  <?php else: ?>
                    <option value="<?= $pais["alpha2Code"] ?>"><?= $pais["name"] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>

              <!-- Manejo de errores Pais -->
              <?php if ( isset($errorsRegister['inCountry']) ) : ?>
              <div class="alert alert-danger" style="margin-top: 8px;">
                <?= $errorsRegister['inCountry'] ?>
              </div>
              <?php endif; ?>

            </div>
          </div>
          <hr>
          <div class="">
            <div class="col-12">
              <!-- SWITCH PARA QUE QUIERO VER -->
              <label for="categorias"><b>Categorías</b></label>
              <div class="container containerSwitch">
                <?php if (count($categorias)>5): ?>
                  <?php foreach ($categorias as $unaCategoria) : ?>
                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-4">
                      <label class="switch">
                        <input type="checkbox" name="categorias[]" value="<?= $unaCategoria ?>"
                        <?php if ($_POST): ?>
                          <?php if (isset($categoriasInPost)): ?>
                            <?php foreach ($categoriasInPost as $unaCatInPost): ?>
                              <?php if ($unaCatInPost == $unaCategoria): ?>
                                checked
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php else: ?>
                          checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                      </label>
                      <span class="switchText"><?= $unaCategoria ?></span>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <?php foreach ($categorias as $unaCategoria) : ?>
                    <div class="containerUnSwitchCat col-6 col-md-4 col-xl-6">
                      <label class="switch">
                        <input type="checkbox" name="categorias[]" value="<?= $unaCategoria ?>"
                        <?php if ($_POST): ?>
                          <?php if (isset($categoriasInPost)): ?>
                            <?php foreach ($categoriasInPost as $unaCatInPost): ?>
                              <?php if ($unaCatInPost == $unaCategoria): ?>
                                checked
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php else: ?>
                          checked
                        <?php endif; ?>
                        >
                        <span class="slider round"></span>
                      </label>
                      <span class="switchText"><?= $unaCategoria ?></span>
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
                      <input type="checkbox" name="notificaciones[]" value="<?= $unaNotificacion ?>"
                      <?php if ($_POST): ?>
                        <?php if (isset($notifInPost)): ?>
                          checked
                        <?php endif; ?>
                      <?php else: ?>
                        checked
                      <?php endif; ?>
                       >
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
              <input type="password" placeholder="Ingresar Contraseña" name="psw" style="<?= isset($errorsRegister['inPsw']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- Manejo de errores de pass -->
              <?php if ( isset($errorsRegister['inPsw']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPsw']; ?>
								</div>
							<?php endif; ?>

              <label for="psw-repeat"><b>Repetir Contraseña</b></label>
              <input type="password" placeholder="Repetir Contraseña" name="psw-repeat" style="<?= isset($errorsRegister['inPswRepeat']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
              <!-- manejo de errores de repetir pass -->
              <?php if ( isset($errorsRegister['inPswRepeat']) ) : ?>
								<div class="alert alert-danger">
									<?= $errorsRegister['inPswRepeat']; ?>
								</div>
							<?php endif; ?>

              <label>
                <input type="checkbox" checked="checked" name="remember" value="ok" style="margin-bottom:15px"> Recordarme
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
