<?php
//Empiezo la session en el header para que este en todos las pag
session_start();
// Traigo las funciones que controlan mi sistema
require_once 'controller.php';
validateCookie();


  $menu = [
    "Quienes Somos" => "index.php#nosotres",
    "Productos" => [
      "Cósmetica Capilar" => "productos.php",
      "Corporales" => "corporales.php",
    ],
    "Ingresar" => "log_in.php",
    "Faqs" => "faqs.php",
    "Contacto" => "#contacto-aqui",
  ]
 ?>



 <header class="bg-dark">

   <nav class="navbar navbar-expand-md mainHeader container col-12 col-md-11 col-lg-10 navbar-dark">

     <div class="clmLogo col-12 col-sm-7 col-md-6 col-lg-3">
        <a class="navbar-brand" href="index.php"><img src="imgs/logo-loremipsum.png" alt=""></a>

        <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
     </div>

     <div class="clmPerfil col-12 col-sm-7 col-md-6 col-lg-8">

       <div class="col-7 perfilHeader">
         <div class="dropdown">
           <a class="nav-link dropdown-toggle p-0"  href="#" id="navbardrop" data-toggle="dropdown">
             <?php if (isset($_SESSION['name'])) {
               echo "Bienvenide " . $_SESSION['name'];
               $imgPerfil = $_SESSION['imgProfile'];
             }else{
               echo "No estas logeado";
               $imgPerfil = 'imgs/img_avatar4.png';
             } ?>
           </a>
           <div class="dropdown-menu ">
             <!-- <a class="dropdown-item" href="perfil.php">Editar tu cuenta</a> -->
             <a class="dropdown-item" href="perfil.php">Ver Favoritos</a>
             <a class="dropdown-item" href="log_out.php">Cerrar Sesión</a>
           </div>
         </div>
         <img src="<?= $imgPerfil ?>" alt="imagen de perfil del usuario logeado">
       </div>

          <form class="searchHeader" action="/action_page.php">
            <input class="col-lg-11 form-control mr-sm-2" type="text" placeholder="¡Quiero encontrarlo!">
            <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
          </form>


     </div>

     <!-- Navbar links con submenu -->
     <div class="collapse navbar-collapse" id="collapsibleNavbar">
       <ul class="navbar-nav mt-3">
         <?php foreach ($menu as $boton => $seccion): ?>

           <!-- Esta parte es para el desplegable -->
           <?php if (is_array($seccion)): ?>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                 <?= $boton ?>
               </a>

               <div class="dropdown-menu  text-center">
                 <?php foreach ($seccion as $suboton => $subseccion): ?>
                 <a class="dropdown-item" href="<?= $subseccion?>"><?= $suboton ?></a>
                 <?php endforeach; ?>
               </div>
             </li>

             <?php else: ?>
               <!-- Si no es desplegable -->
               <?php if (isset($_SESSION['name']) && $boton == "Ingresar"): ?>
                 <li class="nav-item"><a class="nav-link" href="perfil.php">Mi cuenta</a></li>
               <?php else: ?>
                 <li class="nav-item"><a class="nav-link" href="<?= $seccion?>"><?= $boton ?></a></li>
              <?php endif; ?>
           <?php endif; ?>
         <?php endforeach; ?>
       </ul>
     </div>


  </nav>
</header>
