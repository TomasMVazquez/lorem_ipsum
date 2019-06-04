<?php
  $menu = [
    "Quienes Somos" => "index.php#nosotres",
    "Productos" => [
      "Categoria A" => "productos2.php",
      "Categoria B" => "productos2.php",
    ],
    "Faqs" => "faqs.php",
    "Logueate" => "log_in.php",
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
           <a class="nav-link dropdown-toggle p-0"  href="#" id="navbardrop" data-toggle="dropdown">Bienvenido Fulanito</a>
           <div class="dropdown-menu ">
             <a class="dropdown-item" href="perfil.php">Editar tu cuenta</a>
             <a class="dropdown-item" href="perfil.php">Ver Favoritos</a>
             <a class="dropdown-item" href="#">Cerrar Sesión</a>
           </div>
         </div>
         <img src="imgs/img_avatar4.png" alt="">
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
