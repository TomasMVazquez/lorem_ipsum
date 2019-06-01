<?php
$title="Lorem ipsum | Productos";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once("includes/head.php"); ?>
<?php require_once("includes/listado.php"); ?>

  <body>
    <?php require_once("includes/header.php"); ?>



    <div class="container">

      <div class="row">
        <div class="col-12">
          <h1 class="tipografia">Productos</h1>
          <section class="banner-seccion-producto">
            <img class="img-fluid imgbanner" src="imgs/banner-seccion-producto.png" alt="banner">
            <h2 class="titseccion"> Labios</h2>
          </section>
        </div>
      </div>

<!--listado de articulos-->

  <div class="row listado-productos">
    <?php foreach ($listadoProductos as $unProducto): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card producto">
        <img src="<?=$unProducto["imagen-principal"]?>" class="card-img-top" alt="Esta es la imagen 1">
        <div class="card-body">
          <div class="encabezado-producto">
            <h5 class="card-title nombre-producto"><?=$unProducto["nombre"]?></h5>
            <div><ul class="corazon">
              <li style="width:20%"><i class="far fa-heart"></i></li>
            </ul></div>
          </div>
          <p class="card-text"><?=substr($unProducto["descripcion"], 0, 75) . "..."?></p>
          <p style="width:80%" class="card-text">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          </p>
          <hr>
          <div class="precio">
            <span class="precio-nuevo"><?="$" . $unProducto["precio"]?></span>
                <?php if ($unProducto["precio_oferta"]): ?>
                  <del class="precio-viejo"><?= "$ " . $unProducto["precio_oferta"]?></del>
                <?php endif; ?>

          </div>
          <div class="boton-detalle">
            <a class="btn-detalle btn-block" href="detalle_producto2.php?<?="id=" . $unProducto["id"]?>" role="button">Ver detalle</a>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div><!-- row -->

</div><!-- container -->

  <?php require_once("includes/footer.php"); ?>

  </body>
</html>
