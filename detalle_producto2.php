<?php
$title="Lorem ipsum | Detalle Producto";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once("includes/head.php"); ?>
<?php require_once("includes/listado.php"); ?>
<?php
    $productoDetallado = $listadoProductos[$_GET["id"] - 1];
 ?>

  <body>
    <?php include_once("includes/header.php"); ?>

    <div class="container">
      <h1 class="tipografia">Tu elección</h1>

      <section>
        <div class="card producto-detallado">
          <div class="row no-gutters">
            <div class="img-producto col-md-5">
              <img class="card-img-top" src="<?=$productoDetallado["imagen-principal"]?>" alt="Imagen Producto 1">
              <div class="img-min">
                <?php foreach ($productoDetallado["imagenes-secundarias"] as $unaImagen): ?>
                  <img src="<?=$unaImagen?>" alt="">
                <?php endforeach; ?>
              </div>
            </div>

            <div class="col-md-7">
            <div class="card-body">
              <div class="encabezado-producto">
                <h5 class="card-title nombre-producto"><?=$productoDetallado["nombre"]?></h5>
                <div class="corazon">
                  <i class="far fa-heart"></i>
                </div>
              </div>
            <hr>
              <p class="card-text"><?=$productoDetallado["descripcion"]?></p>
            <hr>
              <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
              <div class="comentarios"><?=$productoDetallado["comentarios"] . " comentarios"?></div>
              <hr>
              <div class="precio">
                <span class="precio-nuevo"><?="$" . $productoDetallado["precio"]?></span>
                    <?php if ($productoDetallado["precio_oferta"]): ?>
                      <del class="precio-viejo"><?= "$ " . $productoDetallado["precio_oferta"]?></del>
                    <?php endif; ?>
              </div>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

            </div>

          </div>
          </div>
        </div>

      </section>



    </div>

    <?php include_once("includes/footer.php"); ?>
  </body>
</html>
