<?php
$title="Lorem ipsum | Home";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>

    <?php require_once("includes/header.php") ?>
    <br>

<div class="carrousel-mobile">
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imgs/imagen7.jpg" alt="img 7" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Productos Naturales</h3>
          <p>sdhflkjhvlahvalkjhvkshv</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/imagen1.jpg" alt="img 1" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Cruelty Free</h3>
          <p>adjfhdsjvkjldhv</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/items/3.jpg" alt="img 3" width="1100" height="500">
        <div class="carousel-caption">
          <h3>oh pos si como sea</h3>
          <p>jbgjsdaf</p>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>

  <br>
  <br>

  <h3>Nosotres</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore </p>




  <br>
  <?php require_once("includes/footer.php") ?>

  </body>
</html>
