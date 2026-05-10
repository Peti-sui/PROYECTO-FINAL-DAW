<?php
/* Incluir la configuracion y las funciones auxiliares */
require_once 'includes/config.php';
require_once 'includes/funciones.php';

/* ID de la categoria Ropa */
$categoria_id = 1;

/* Obtener todos los productos de la categoria Ropa ordenados por ID descendente */
$resultado = $conn->query("SELECT * FROM productos WHERE categoria_id = $categoria_id ORDER BY id DESC");
$productos = $resultado;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SWAGSCORD-ROPA</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./src/styles/style.css" />
</head>

<body style="background-color: #440203">
  <header>
    <a href="./index.php">
      <img class="logo-header" src="./img/logo-SWAGSCORD.png" alt="Logo-Marca" />
    </a>

    <a href="./index.php" style="color: inherit;">
      <div class="SWAGSCORD">SWAGSCORD</div>
    </a>

    <div class="hamburger" id="hamburgerBtn">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <ul class="nav-menu" id="navMenu">
      <li><a href="./index.php" class="nav-link">Inicio</a></li>
      <li><a href="./Ropa.php" class="nav-link">Ropa</a></li>
      <li><a href="./accesorios.php" class="nav-link">Accesorios</a></li>
      <li><a href="./contacto.html" class="nav-link">Contacto</a></li>
    </ul>
  </header>

  <!-- Boton flotante de WhatsApp -->
  <a href="https://wa.me/34600123456" target="_blank"
    style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <img class="wasa" src="./img/wasa.png" style="width: 50px; height: 50px; transition: transform 0.3s;">
  </a>


  <main class="text-white">
    <div class="sec-ropa">

      <!-- Inicializacion de los carruseles Splide para las tarjetas de producto -->
      <script>
        (function () {
          function initCarousels() {
            var carousels = document.querySelectorAll('.splide-producto');
            console.log('Carruseles encontrados:', carousels.length);

            carousels.forEach(function (el, index) {
              var splide = new Splide(el, {
                type: 'fade',
                perPage: 1,
                autoplay: true,
                interval: 4000,
                arrows: true,
                rewind: true,
                pagination: false,
                pauseOnHover: false,
                pauseOnFocus: false
              });
              splide.mount();
              splide.Components.Autoplay.play();
            });
          }

          if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCarousels);
          } else {
            initCarousels();
          }
        })();
      </script>

      <div class="d-flex flex-wrap justify-content-center gap-4 p-4">
        /* Recorrer cada producto y generar una tarjeta por cada uno */
        <?php while ($producto = $productos->fetch_assoc()):
          $imagenes = obtenerImagenesDeCarpeta($producto['carpeta_imagenes']);
          ?>
          <div class="tarjeta-prodcuto card text-center" style="width: 288px;">

            <!-- Carrusel del producto con todas sus imagenes -->
            <div class="splide splide-producto" id="splide<?php echo $producto['id']; ?>">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php foreach ($imagenes as $img): ?>
                    <li class="splide__slide">
                      <img src="<?php echo $img; ?>" style="width: 100%; height: 250px; object-fit: cover;">
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

            <div class="card-body">
              <h5 class="card-title text-white fs-3">
                <?php echo $producto['nombre']; ?>
              </h5>
              <div class="linea-bonita-tarjeta" style="height: 3px; background-color: #660408;"></div>

              <p class="card-text text-white fs-4">
                <?php echo $producto['precio']; ?> €
              </p>

              <div class="linea-bonita-tarjeta" style="height: 3px; background-color: #660408;"></div>

              <p class="card-text text-white fs-4"
                style="font-family: 'Textbook-Charlie', Arial, Helvetica, sans-serif !important;">
                <?php echo $producto['descripcion']; ?>
              </p>
            </div>

          </div>
        <?php endwhile; ?>
      </div>
    </div>

    <!-- Seccion del footer superior con enlaces legales -->
    <div class="sec-4">
      <div
        class="contenedor-footer-arriba container-fluid align-items-center justify-content-center text-center position-absolute">
        <div class="fila-footer-arriba row w-100">
          <div
            class="columna-izquierda-footer-arriba col-4 d-flex flex-column justify-content-center align-items-center text-center">
            <div class="correo-footer"><a href="mailto:swaginfo@gmail.com">swaginfo@gmail.com</a></div>
            <div class="separaciones-links-footer"></div>
            <div class="politica-privacidad"><a
                href="https://www.aepd.es/politica-de-privacidad-y-aviso-legal">Politica-Privacidad</a></div>
            <div class="separaciones-links-footer"></div>
            <div class="politica-galletas"><a
                href="https://textos-legales.edgartamarit.com/politica-cookies-adatada-rgpd/">Politica-Cookies</a></div>
          </div>
          <div class="columna-medio-footer-arriba col-4">
            <a href="./index.php"><img class="logo-footer img-fluid" src="./img/logo-SWAGSCORD.png"
                alt="Logo-Marca" /></a>
          </div>
          <div
            class="columna-derecha-footer-arriba col-4 d-flex flex-column justify-content-center align-items-center text-center">
            <div class="telefono-footer"><a href="tel:+34600123456">+34 600 123 456</a></div>
            <div class="separaciones-links-footer"></div>
            <div class="aviso-legal"><a href="https://www.aepd.es/politica-de-privacidad-y-aviso-legal"
                target="_blank">Aviso Legal</a></div>
            <div class="separaciones-links-footer"></div>
            <div class="condiciones-de-venta"><a href="./condiciones-venta.html">Condiciones de Venta</a></div>
          </div>
        </div>
      </div>
      <div class="separacion-abajo-footer"></div>
      <img class="fondo-footer-arriba" src="./img/footer-arriba-informacion.png">
    </div>
  </main>

  <footer>
    <div class="position-relative">
      <div class="d-flex justify-content-center align-items-center gap-3">
        <img class="metodos-pagos" src="./img/metodos-pago.png">
        <img class="bizum" src="./img/Bizum.png">
      </div>
      <div class="copy position-absolute start-50 translate-middle-x text-center w-100"
        style="background-color: white;">
        copyright © 2026 SWAGSCORD. Todos los derechos reservados junto a las marcas de ropa.
        Pagina realizada por Kevin Alejandro Ramos Bernal - Scoo
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
  <script src="./src/app/script.js"></script>
</body>

</html>