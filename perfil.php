<?php
$title="Lorem ipsum | Perfil";

$categorias = ["Maquillajes","Labiales","Shampoos","Cremas","Mascaras","Tonificadores","Algo","Otros"];
$notificaciones = ["noticias"];

$paises = file_get_contents('https://restcountries.eu/rest/v2/all');
$arrayPaises = json_decode($paises,true);
// Traigo las funciones que controlan mi sistema de Registro Login y Perfil
require_once 'register-controller.php';

if ($_POST) {

  $nameInPost = trim($_POST['name']);
  $lastNameInPost = trim($_POST['lastName']);
  $emailInPost = trim($_POST['email']);

  $errorsUpdate = profileUpdateValidate();

  if (!$errorsUpdate) {
    if ($_FILES['avatar']['name']!='') {
      $imgName = saveImage($_FILES['avatar']);
      $_POST['imgProfile'] = $imgName;
    }else {
      $_POST['imgProfile'] = 'imgs/img_avatar4.png';
    }

    updateUser();

    $_SESSION = getUserData($emailInPost);

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
    <div class="containerProfile">
      <div class="col-12 col-md-11 col-lg-10">
        <!-- COMIENZA EL PROFILE -->
        <div class="row">
          <!-- COSTADO CON EL PROFILE -->
          <aside class="containerAside col-12 col-md-6 col-lg-4">
            <div class="aside">
              <br>
              <h2>Bienvenid@ <?= $_SESSION["name"] ?></h2>

              <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
              <form class="profile" method="post" enctype="multipart/form-data">

                <!-- CONTENEDOR IMAGEN AVATAR -->
                <div class="imgContainerProfile">
                  <label for="avatar"><b>Imagen de Perfil</b>
                    <img src="<?= $_SESSION["imgProfile"] ?>" alt="Avatar" class="avatar" style="cursor:pointer">
                  </label>
                  <input id="avatar" type="file" name="avatar" class="custom-file-input">
                  <?php if ( isset($errorsRegister['inAvatar']) ) : ?>
    								<div class="alert alert-danger">
    									<?= $errorsInRegister['inAvatar'] ?>
    								</div>
    							<?php endif; ?>
                </div>
                <!-- FIN CONTENEDOR IMAGEN AVATAR -->

                <div class="container">

                  <label for="name"><b>Nombre</b></label>
                  <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= $_SESSION["name"] ?>">

                  <label for="lastName"><b>Apellido</b></label>
                  <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= $_SESSION["lastName"] ?>">

                  <label for="email"><b>Email</b></label>
                  <input type="email" placeholder="Ingresar Email" name="email" value="<?= $_SESSION["email"] ?>">

                  <label for="pais"><b>Pais</b></label>
                  <select class="custom-select" name="pais">
                    <?php foreach ($arrayPaises as $pais): ?>
                      <?php if ($_SESSION["pais"] == $pais["alpha2Code"]): ?>
                        <option value="<?= $pais["alpha2Code"] ?>" selected ><?= $pais["name"] ?></option>
                      <?php else: ?>
                        <option value="<?= $pais["alpha2Code"] ?>"><?= $pais["name"] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>

                  <!-- SWITCH PARA QUE QUIERO VER -->
                  <div class="container containerSwitch">
                    <?php foreach ($categorias as $unaCategoria) : ?>
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="categorias[]" value="<?= $unaCategoria ?>"
                            <?php if (isset($_SESSION['categorias'])) : ?>
                              <?php foreach ($_SESSION['categorias'] as $categoria) : ?>
                                <?php if ($categoria == $unaCategoria) : ?>
                                  checked
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          >
                          <span class="slider round"></span>
                        </label>
                        <em class="switchText"><?= $unaCategoria ?></em>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                  <div class="container containerSwitch">
                    <?php foreach ($notificaciones as $unaNotificacion) : ?>
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="notificaciones[]" value="<?= $unaNotificacion ?>"
                          <?php if (isset($_SESSION['notificaciones'])) : ?> checked <?php endif; ?>>
                          <span class="slider round"></span>
                        </label>
                        <em class="switchText">Quiero recibir <?= $unaNotificacion ?></em>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="btnForm">
                    <button class="btn-primary" type="submit">Actualizar</button>
                  </div>
                  <hr>
                  <div class="btnForm">
                    <button class="btn-secondary" type="button">Modificar Contraseña</button>
                  </div>
                </div>
              </form>
            </div>
          </aside>
          <!-- MAIN CON LOS FAVORITOS -->
          <main class="containerMain col-12 col-md-6 col-lg-8">
            <div class="main">
              <hr>
              <div class="container">
                <h2>Estos son tus favoritos</h2>
              </div>
              <hr>
              <!-- TARJETAS FAVORITOS -->
              <div class="col-12 justify-content-center">
                <div class="card">
                  <div class="tituloCardFav">
                    <h3 class="card-title">Card title</h3>
                    <div class="corazon">
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-4">
                      <img src="imgs/items/1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-8">
                      <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="buttonsCard">
                          <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--FIN TARJETAS FAVORITOS -->
            </div>
          </main>
        </div>
        <!-- TERMINA EL PROFILE -->
      </div>

    </div>
    <?php require_once("includes/footer.php"); ?>
    <!-- ACA PONER INCLUDE FOOTER -->
  </body>

</html>
