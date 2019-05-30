<?php
$title="Lorem ipsum | Productos";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("includes/head.php") ?>
  <body>
    <!-- ACA PONER INCLUDE HEADER -->
    <?php require_once("includes/header.php") ?>
    <br>
    <div class="container">
      <h1 class="tipografia">Productos</h1>
      <div class="row banner">
        <div class="col-12">
          <section class="banner-seccion-producto">
            <img class="img-fluid imgbanner" src="imgs/banner-seccion-producto.png" alt="banner">
            <h2 class="titseccion"> Labios</h2>
          </section>
        </div>
      </div>

<!--listado de articulos-->

    <div class="row listado-productos">
      <!--empieza articulo-->
      <div class="col-12 col-sm-6 col-md-4 col-md-4">
          <article class="card producto">
          <div class="img-producto"><img class="img-fluid" src="imgs/items/1.jpg" alt="Producto 1"></div>
          <div class="detalle">
            <h4 class="nombre-producto">Nombre producto 1</h4>
            <p class="card-text">Acá va la descripción del producto 1</p>
            <div class="rating">
              <ul class="estrellas">
                <li style="width:80%">
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </li>
              </ul>
              <div class="comentarios">12 comentarios</div>
              <div class="vendidos">125 vendidos </div>
            </div> <!-- rating-wrap.// -->
          </div> <!--termina el detalle -->
          <div class="ordenar">
              <a href="" class="btn btn-sm btn-primary float-right">Ver detalle</a>
              <div class="precio">
                <span class="precio-nuevo">$120</span> <del class="precio-viejo">$345</del>
              </div> <!-- price-wrap.// -->
          </div> <!-- bottom-wrap.// -->
        </article>
      </div>  <!--termina mi column -->
      <!--fin articulo-->
      <!--empieza articulo-->
      <div class="col-12 col-sm-6 col-md-4">
          <article class="card producto">
          <div class="img-producto"><img class="img-fluid" src="imgs/items/2.jpg" alt="Producto 2"></div>
          <div class="detalle">
            <h4 class="nombre-producto">Nombre producto 2</h4>
            <p class="card-text">Acá va la descripción del producto 2</p>
            <div class="rating">
              <ul class="estrellas">
                <li style="width:80%">
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </li>
              </ul>
              <div class="comentarios">134 comentarios</div>
              <div class="vendidos">15 vendidos </div>
            </div>
          </div> <!--termina el detalle -->
          <div class="ordenar">
              <a href="" class="btn btn-sm btn-primary float-right">Ver detalle</a>
              <div class="precio">
                <span class="precio-nuevo">$1290</span> <del class="precio-viejo">$1345</del>
              </div>
          </div>
        </article>
      </div>  <!--termina mi column -->
      <!--fin articulo-->
      <!--empieza articulo-->
      <div class="col-12 col-sm-6 col-md-4">
          <article class="card producto">
          <div class="img-producto"><img class="img-fluid" src="imgs/items/3.jpg" alt="Producto 3"></div>
          <div class="detalle">
            <h4 class="nombre-producto">Nombre producto 3</h4>
            <p class="card-text">Acá va la descripción del producto 3</p>
            <div class="rating">
              <ul class="estrellas">
                <li style="width:80%">
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </li>
              </ul>
              <div class="comentarios">12 comentarios</div>
              <div class="vendidos">125 vendidos </div>
            </div>
          </div> <!--termina el detalle -->
          <div class="ordenar">
              <a href="" class="btn btn-sm btn-primary float-right">Ver detalle</a>
              <div class="precio">
                <span class="precio-nuevo">$12</span> <del class="precio-viejo">$45</del>
              </div>
          </div>
        </article>
      </div>  <!--termina mi column -->
      <!--fin articulo-->

        <!--empieza articulo-->
        <div class="col-12 col-sm-6 col-md-4">
            <article class="card producto">
            <div class="img-producto"><img class="img-fluid" src="imgs/items/1.jpg" alt="Producto 4"></div>
            <div class="detalle">
              <h4 class="nombre-producto">Nombre producto 4</h4>
              <p class="card-text">Acá va la descripción del producto 4</p>
              <div class="rating">
                <ul class="estrellas">
                  <li style="width:80%">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                </ul>
                <div class="comentarios">6 comentarios</div>
                <div class="vendidos">5 vendidos </div>
              </div>
            </div> <!--termina el detalle -->
            <div class="ordenar">
                <a href="" class="btn btn-sm btn-primary float-right">Ver detalle</a>
                <div class="precio">
                  <span class="precio-nuevo">$120</span> <del class="precio-viejo">$345</del>
                </div>
            </div>
          </article>
        </div>  <!--termina mi column -->
        <!--fin articulo-->

  </div><!-- row.// -->
  </div><!-- container.// -->

    <br>
    <?php require_once("includes/footer.php") ?>
    <!-- ACA PONER INCLUDE FOOTER -->
  </body>
</html>
