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


    <div class="row justify-content-center"  style="margin:5px 0">
      <div class="col-12 col-md-11 col-xl-10">
      <!--Barra de navegacion -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="productos2.php">Productos</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?=$productoDetallado["nombre"]?></li>
        </ol>
      </nav>
      <!--Fin Barra de navegacion -->
      <!--Producto detallado -->
      <section class="producto-detallado">
        <div class="card">
          <div class="row">
            <div class="img-producto col-md-5">
              <img class="card-img-top" src="<?=$productoDetallado["imagen-principal"]?>" alt="Imagen Producto 1">
              <div class="img-min">
                <?php foreach ($productoDetallado["imagenes-secundarias"] as $unaImagen): ?>
                  <img src="<?=$unaImagen?>" alt="<?=$productoDetallado["nombre"]?>">
                <?php endforeach; ?>
              </div>
            </div>

            <div class="col-md-7">
            <div class="card-body">
              <div class="encabezado-producto">
                <h5 class="card-title nombre-producto-detalle" style="text-align:left;"><?=$productoDetallado["nombre"]?></h5>
                <div class="corazon">
                  <i class="far fa-heart"></i>
                </div>
              </div>
            <hr>

              <p class="card-text"><?=$productoDetallado["copete"]?></p>
            <hr>
            <div class="presentaciones">
              <p style="text-transform:uppercase;"><strong>Presentaciones</strong></p>
                <ul>
              <?php foreach ($productoDetallado["presentacion"] as $unaPresentacion): ?>
                <li class="presentacion"><?=$unaPresentacion?></li>
              <?php endforeach; ?>
               </ul>
            </div>
            <hr>

              <div class="row">
                <p class="card-text col-10">
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </p>
                <p class="col-2" style="text-align:center;"><i class="fas fa-share-alt"></i></p>
              </div>
              <br>
              <!-- Acordeon con info -->
              <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span style="font-size:1.1em;">+</span> Descripción
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <?=$productoDetallado["descripcion"]?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span style="font-size:1.1em;">+</span> Beneficios
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <?=$productoDetallado["beneficios"]?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <span style="font-size:1.1em;">+</span> Modo de uso
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <?=$productoDetallado["modo-de-uso"]?>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Acordeon con info -->


            </div>

          </div>
          </div>
        </div>

      </section>
      <!--Fin Producto detallado -->

    </div>
    </div>

    <?php include_once("includes/footer.php"); ?>
  </body>
</html>
