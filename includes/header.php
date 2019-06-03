<?php
  $menu = [
    "Quienes Somos" => "index.php",
    "Productos" => [
      "Categoria A" => "productos2.php",
      "Categoria B" => "productos2.php",
    ],
    "Faqs" => "faqs.php",
    "Logueate" => "log_in.php",
    "Contacto" => "#contacto-aqui",
    "Novedades" => [
      "Eventos" => "cosmetica1.php",
      "Lanzamientos" => "cosmetica2.php",
    ],
  ]
 ?>



 <header class="bg-dark">

   <nav class="navbar navbar-expand-md mainHeader container col-12 col-md-11 col-lg-10 navbar-dark">

     <div class="clmLogo col-12 col-sm-6 col-md-6 col-lg-3">
        <a class="navbar-brand" href="index.php"><img src="imgs/logo-loremipsum.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
     </div>

     <div class="clmPerfil col-12 col-sm-6 col-md-6 col-lg-9">

       <div class="perfilHeader">
         <div class="dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Bienvenido Fulanito</a>
           <div class="dropdown-menu ">
             <a class="dropdown-item" href="#">Modificar tu cuenta</a>
             <a class="dropdown-item" href="#">Ver Favoritos</a>
             <a class="dropdown-item" href="#">Cambiar tu foto de perfil</a>
           </div>
         </div>
         <img src="imgs/img_avatar4.png" alt="">
       </div>

       <div class="">
         Buscador
       </div>

     </div>

     <!-- Navbar links con submenu -->
     <div class="collapse navbar-collapse" id="collapsibleNavbar">
       <ul class="navbar-nav mt-3">
         <?php foreach ($menu as $boton => $seccion): ?>

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
               <li class="nav-item"><a class="nav-link" href="<?= $seccion?>"><?= $boton ?></a></li>

           <?php endif; ?>
         <?php endforeach; ?>
       </ul>
     </div>


  </nav>
</header>
