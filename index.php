<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOREM-IPSUM | Bienvenidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <?php
      include("./header.php");
   ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="imgs/imagen1.jpg" alt="cosmetica1">
          <div class="carousel-caption">
          <h3 class="textoimg">imagen1</h3>
          <p class="textoimg2">vemosquepongo1</p>
          </div>
        </div>

        <div class="item">
          <img src="imgs/imagen5.jpg" alt="cosmetica2">
          <div class="carousel-caption">
            <h3 class="textoimg">imagen2</h3>
            <p class="textoimg2">vemos que pongo 2</p>
          </div>
        </div>

        <div class="item">
          <img src="imgs/imagen3.jpg" alt="cosmetica3">
          <div class="carousel-caption">
            <h3 class="textoimg">imagen3</h3>
            <p class="textoimg2">vemos que pongo3</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



  <?php
        include("./footer.php");
  ?>


  </body>
</html>
