<?php
// Traigo las funciones que controlan mi sistema
require_once 'controller-general.php';

//Verifico si esta logeado
if ( isLogged() ) {
  $user = $_SESSION['userLogged'];
}

  $menu = [
    "Quienes Somos" => "index.php#nosotres",
    "Productos" => [
      "Cósmetica Capilar" => "productos.php",
      "Corporales" => "corporales.php",
    ],
    /*"Registrate" => "register.php",
    "Perfil" => "perfil.php",*/
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
            
            <?php if (isset($user['name'])): ?>
            <a class="nav-link dropdown-toggle p-0"  href="#" id="navbardrop" data-toggle="dropdown">
              <?= "Bienvenide ". $user['name'];
               $imgPerfil = $user['imgProfile']; ?>
              
            </a>
            
            <div class="dropdown-menu ">
               <a class="dropdown-item" href="perfil.php">Mi cuenta</a> 
               <a class="dropdown-item" href="perfil.php">Ver Favoritos</a>
               <a class="dropdown-item" href="log_out.php">Cerrar Sesión</a>
            </div>

            </div>

            
            <!--<svg>
              <defs>
                <linearGradient id="gradient" x1="0" y1="00%" x2 ="0" y2="100%">
                  <stop stop-color="black" offset="0"/>
                  <stop stop-color="white" offset="1"/>
                </linearGradient>

                <mask id="masking" maskUnits="objectBoundingBox" maskContentUnits="objectBoundingBox">
                  <rect y="0.3" width="1" height=".7" fill="url(#gradient)" />
                  <circle cx=".5" cy=".5" r=".35" fill="white" />
                </mask>
              </defs>
            </svg>

            <img src="imgs/imagen1.jpg" width="50" class="avatar">-->
            

            <div class="img">
             
            <img src="<?= $imgPerfil ?>" alt="imagen de perfil del usuario logeado"></div>
          
            <?php else: ?>
              <div style="text-align: right;">
                 Bienvenide<p><i class="fas fa-sign-in-alt mr-2"></i><a href="log_in.php">¡Ingresá al sistema!</a></p>
              </div>
           </div> 
            <?php endif ?>
          
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

               <li class="nav-item"><a class="nav-link" href="<?= $seccion?>"><?= $boton ?></a></li>
              
           <?php endif; ?>
         <?php endforeach; ?>

         <?php if (!isset($user) ): ?>
                 <li class="nav-item"><a class="nav-link" href="register.php">Registrese</a></li>

         <?php endif; ?>

         <li class=" text-center perfilMobile">
               <?php if (isset($user['name'])): ?>
                <a class="nav-link dropdown-toggle p-1" href="#" id="navbardrop" data-toggle="dropdown">
                  <?= "Bienvenide ". $user['name'];?>
                </a>

                <div class="dropdown-menu ">
                   <a class="dropdown-item" href="perfil.php">Mi cuenta</a> 
                   <a class="dropdown-item" href="perfil.php">Ver Favoritos</a>
                   <a class="dropdown-item" href="log_out.php">Cerrar Sesión</a>
                </div>

                <?php else: ?>
                  <div >
                    <i class="fas fa-sign-in-alt mr-2"></i><a href="log_in.php">¡Ingresá al sistema!</a>
                <?php endif ?>
          </li>
       </ul>
     </div>


  </nav>
</header>
