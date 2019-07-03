<?php
$title="Lorem ipsum | Perfil";
// Traigo las funciones que controlan mi sistema
require_once 'controller-general.php';

//Verificamos si NO esta logeado y si lo esta lo direccionamos al LOGIN
if ( !isLogged() ) {
  header('location: log_in.php');
  exit;
}

$categorias = ["Maquillajes","Labiales","Shampoos","Cremas","Mascaras","Tonificadores","Algo","Otros"];
$notificaciones = ["noticias"];
//Traigo los pasises de la API y las pasos a un array
$paises = file_get_contents('https://restcountries.eu/rest/v2/all');
$arrayPaises = json_decode($paises,true);

if ($_POST) {

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

  //Validamos errores
  $errorsUpdate = profileUpdateValidate();

  //Si no hay errores guardamos
  if (!$errorsUpdate) {

    if ($_FILES['avatar']['name']!='') {
      $imgName = saveImage($_FILES['avatar']);
      $_POST['imgProfile'] = $imgName;
    }else {
      $_POST['imgProfile'] = $_SESSION['userLogged']['imgProfile'];
    }

    //Guardamos los cambios
    updateUser($_SESSION['userLogged']['user']);

    //Refrescamos
    reLogin(getUserData($_SESSION['userLogged']['user']));
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
              <h2>Bienvenid@ <?= $user["name"] ?></h2>

              <!-- PONEMOS UN FORMULARIO AUTOCOMPLETADO PARA QUE SI QUIERE LO PUEDA EDITAR -->
              <form class="profile" method="post" enctype="multipart/form-data">

                <!-- CONTENEDOR IMAGEN AVATAR -->
                <div class="imgContainerProfile">
                  <label for="avatar"><b>Imagen de Perfil</b>
                    <div class="imgPerfil">
                      <img src="<?= $user["imgProfile"] ?>" alt="Avatar"  style="cursor:pointer">
                    </div>

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

                  <label for="user"><b>Usuario</b></label>
                  <input type="text" placeholder="Ingresar Usuario" name="user" value="<?= $user["user"] ?>"
                   disabled>

                  <label for="name"><b>Nombre</b></label>
                  <input type="text" placeholder="Ingresar Nombre" name="name" value="<?= $user["name"] ?>"
                  style="<?= isset($errorsUpdate['inName']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
                  <!-- Manejo de errores usuario -->
                  <?php if ( isset($errorsUpdate['inName']) ) : ?>
                  <div class="alert alert-danger">
                    <?= $errorsUpdate['inName'] ?>
                  </div>
                  <?php endif; ?>

                  <label for="lastName"><b>Apellido</b></label>
                  <input type="text" placeholder="Ingresar Apellido" name="lastName" value="<?= $user["lastName"] ?>"
                  style="<?= isset($errorsUpdate['inLastName']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
                  <!-- Manejo de errores usuario -->
                  <?php if ( isset($errorsUpdate['inLastName']) ) : ?>
                  <div class="alert alert-danger">
                    <?= $errorsUpdate['inLastName'] ?>
                  </div>
                  <?php endif; ?>

                  <label for="email"><b>Email</b></label>
                  <input type="email" placeholder="Ingresar Email" name="email" value="<?= $user["email"] ?>"
                  style="<?= isset($errorsUpdate['inEmail']) ? 'border: solid 1.5px #BD3131;' : '' ?> ">
                  <!-- Manejo de errores usuario -->
                  <?php if ( isset($errorsUpdate['inEmail']) ) : ?>
                  <div class="alert alert-danger">
                    <?= $errorsUpdate['inEmail'] ?>
                  </div>
                  <?php endif; ?>

                  <label for="pais"><b>País</b></label>
                  <select class="custom-select" name="pais">
                    <?php foreach ($arrayPaises as $pais): ?>
                      <?php if ($user["pais"] == $pais["alpha2Code"]): ?>
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
                            <?php if ($_POST): ?>
                              <?php if (isset($categoriasInPost)): ?>
                                <?php foreach ($categoriasInPost as $unaCatInPost): ?>
                                  <?php if ($unaCatInPost == $unaCategoria): ?>
                                    checked
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php if (isset($user['categorias'])) : ?>
                                <?php foreach ($user['categorias'] as $categoria) : ?>
                                  <?php if ($categoria == $unaCategoria) : ?>
                                    checked
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          >
                          <span class="slider round"></span>
                        </label>
                        <span class="switchText switchTextPerfil"><?= $unaCategoria ?></span>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <!-- SWITCH PARA QUE QUIERO RECIBIR -->
                  <div class="container containerSwitch">
                    <?php foreach ($notificaciones as $unaNotificacion) : ?>
                      <div class="containerUnSwitch col-12">
                        <label class="switch">
                          <input type="checkbox" name="notificaciones[]" value="<?= $unaNotificacion ?>"
                            <?php if ($_POST): ?>
                              <?php if (isset($categoriasInPost)): ?>
                                <?php foreach ($categoriasInPost as $unaCatInPost): ?>
                                  <?php if ($unaCatInPost == $unaCategoria): ?>
                                    checked
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php if (isset($user['notificaciones'])) : ?> checked <?php endif; ?>
                            <?php endif; ?>
                          >
                          <span class="slider round"></span>
                        </label>
                        <em class="switchText">Quiero recibir <?= $unaNotificacion ?></em>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="btnForm" style="margin-top:20px">
                    <button class="btn-primary" type="submit">Actualizar</button>
                  </div>
                  <hr>
                  <div class="btnForm">
                    <a class="btn btn-secondary" href="change_pass.php">Modificar Contraseña</a>
                  </div>
                  <hr>
                  <div class="btnForm btnLogOut">
                    <a class="btn btn-block log-out" href="log_out.php">Cerrar Sesión</a>
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
