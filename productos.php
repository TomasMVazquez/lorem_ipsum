<?php
$title="Lorem ipsum | Productos";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once("includes/head.php"); ?>
<?php require_once("includes/listado.php"); ?>

  <body>
    <?php require_once("includes/header.php"); ?>
    <div class="contenedor-productos">
    <div class="row justify-content-center row-sin-margen">
      <div class="col-12 col-md-11 col-xl-10">

<!--encabezado-->

        <div>
          <h1 class="tit-productos">Productos</h1>
          <section class="banner-seccion-producto">
            <img class="img-fluid imgbanner" src="imgs/banner-seccion-producto.png" alt="banner">
            <h2 class="titseccion"> Cabello</h2>
          </section>
        </div>

<!--fin encabezado-->


<!--listado de articulos-->

  <div class="listado-productos">
    <?php foreach ($listadoProductos as $unProducto): ?>
      <div class="col-md-6 col-lg-4 col-producto">
        <div class="card producto">
        <a href="detalle_producto.php?<?="id=" . $unProducto["id"]?>"><img src="<?=$unProducto["imagen-principal"]?>" class="card-img-top" alt="<?=$unProducto["nombre"]?>"></a>
        <div class="card-body detalle-producto">
            <div class="encabezado-producto">
              <h5 class="card-title nombre-producto" style="text-align:left;"><a href="detalle_producto.php?<?="id=" . $unProducto["id"]?>"><?=$unProducto["nombre"]?></a></h5>
              <div><ul class="corazon">
                <li style="width:20%"><i class="far fa-heart"></i></li>
              </ul></div>
            </div>
            <p class="card-text"><?=substr($unProducto["copete"], 0, 120) . "..."?></p>
            <div class="row">
              <p class="card-text col-10">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
              </p>
              <p class="col-2"><i class="fas fa-share-alt"></i></p>
            </div>
            <div class="boton-detalle">
              <a class="btn btn-primary btn-block" href="detalle_producto.php?<?="id=" . $unProducto["id"]?>" role="button">Ver detalle</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <!-- fin listado de articulos-->

    </div>
  </div>
</div>


  <?php require_once("includes/footer.php"); ?>

  </body>
</html>
