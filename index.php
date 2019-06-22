<?php
$title="Lorem ipsum | Home";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>

    <?php require_once("includes/header.php") ?>

<!-- Carousel mobile-->

<div class="mobile">
  <div id="demo" class="carousel slide" data-ride="carousel">


    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>


    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imgs/imagen7.jpg" alt="img 7" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="textmob">Cosmetica Natural</h3>
          <p class="textsl">Productos elaborados con activos naturales.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/imagen1.jpg" alt="img 1" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="textmob">Cruelty Free</h3>
          <p class="textsl">Testeos dermatológicos sin crueldad.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/items/5.jpg" alt="img 3" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="textmob">Cuidado capilar</h3>
          <p class="textsl">Probá nuestra nueva línea de cuidado capilar</p>
        </div>
      </div>
    </div>
    <!-- controles! -->

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>


<!--hasta aca va el carousel mobile -->


<div class="wide">
  <div id="demo" class="carousel slide" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imgs/slides/cosmetica_naturalok.jpg" alt="img 1" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="titulo-interno">Cosmetica Natural</h3>
          <p class="texto-interno">Productos elaborados con activos naturales.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/slides/banner2.jpg" alt="img 2" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="titulo-interno">Cruelty Free</h3>
          <p class="texto-interno">Testeos dermatológicos sin crueldad.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/slides/hair-banner.jpg" alt="img 3" width="500" height="500">
        <div class="carousel-caption">
          <h3 class="titulo-interno">Cuidado capilar</h3>
          <p class="texto-interno">Probá nuestra nueva línea de cuidado capilar</p>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>

<!--hasta aca va el carousel wide -->

  <h1 id="nosotres" class="about">Nosotres</h1>
  <p class="aboutp"><strong>Lorem Ipsum Cosmética</strong> nace para darle belleza y cuidado a tu pelo y tu piel.
    Todos nuestros productos son hipoalergénicos y están testeados dermatológiccmente con alternativas libres de crueldad.
    Descubrí la riqueza y los beneficios de nuestros productos.
  </p>


<!--ver de sumar "Los favoritos de la semana"  -->

  <br>
  <?php require_once("includes/footer.php") ?>

  </body>
</html>
