<?php
require_once 'includes/config.php';
require_once 'includes/funciones.php';

$accesorios = $conn->query("
    SELECT * FROM productos 
    WHERE categoria_id = 2 
    ORDER BY id DESC
");

$ropa = $conn->query("
    SELECT * FROM productos 
    WHERE categoria_id = 1 
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SWAGSCORD</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./src/styles/style.css" />
</head>

<body style="background-color: #440203">
  <header>
    <a href="./index.php">
      <img class="logo-header" src="./img/logo-SWAGSCORD.png" alt="Logo-Marca" />
    </a>

    <a href="./index.php" style="color: inherit">
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

  <a href="https://wa.me/34600123456" target="_blank"
    style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <img class="wasa" src="./img/wasa.png" style="width: 50px; height: 50px; transition: transform 0.3s;">
  </a>

  <main class="text-white">
    <div class="sec-1 container text-center">
      <div class="fila-carrouseles-inicio row">
        <div class="columna1-carrousel-inicio col-md-12 col-lg-6">
          <div class="card position-relative">
            <img class="papel-roto-carrousel-inicio position-absolute top-50 start-50 translate-middle"
              src="./img/papel-roto-carousel.png" />

            <div class="card-body d-flex justify-content-center">
              <a href="./accesorios.php">
                <div class="splide" id="miSlider1">
                  <div class="splide__track">
                    <ul class="splide__list">
                      <?php
                      if ($accesorios && $accesorios->num_rows > 0):
                        while ($producto = $accesorios->fetch_assoc()):
                          $imagen = obtenerPrimeraImagen($producto['carpeta_imagenes']);
                          ?>
                          <li class="splide__slide">
                            <img class="img-carro-accesorios img-fluid" src="<?php echo $imagen; ?>"
                              style="height: 350px; width: 350px; border-radius: 50%; object-fit: cover;"
                              alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                          </li>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </ul>
                  </div>
                </div>
              </a>
              <a href="./accesorios.php" class="entrar text-white position-absolute" style="top: 370px">Entrar</a>
            </div>
          </div>
          <div class="separacion1"></div>
        </div>

        <div class="separacion1"></div>

        <div class="columna2-carrousel-inicio col-md-12 col-lg-6">
          <div class="card position-relative">
            <img class="papel-roto-carrousel-inicio position-absolute top-50 start-50 translate-middle"
              src="./img/papel-roto-carousel.png" />

            <div class="card-body d-flex justify-content-center">
              <a href="./Ropa.php">
                <div class="splide" id="miSlider2">
                  <div class="splide__track">
                    <ul class="splide__list">
                      <?php
                      if ($ropa && $ropa->num_rows > 0):
                        while ($producto = $ropa->fetch_assoc()):
                          $imagen = obtenerPrimeraImagen($producto['carpeta_imagenes']);
                          ?>
                          <li class="splide__slide">
                            <img class="img-carro-accesorios img-fluid" src="<?php echo $imagen; ?>"
                              style="height: 350px; width: 350px; border-radius: 50%; object-fit: cover;"
                              alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                          </li>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </ul>
                  </div>
                </div>
              </a>
              <a href="./Ropa.php" class="entrar text-white position-absolute" style="top: 370px">Entrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sec-2">
      <div class="separacion2"></div>
      <div class="contenedor-eslogan">

        <img class="papel-eslogan-inicio" src="./img/papel-slogan.png" />

        <div class="eslogan">
          #SWAG *For You*
        </div>
      </div>
    </div>

    <div class="sec-3">

      <div class="d-flex justify-content-center align-items-center">
        <div class="sobre-swagscord text-center ">
          SWAGSCORD nace en Canarias con una misión clara: traer el streetwear más exclusivo y el estilo "Toyoko Kid"
          que
          no encuentras en las islas. Ropa, joyas y accesorios de marcas emergentes o no tan emergentes internacionales,
          sin necesidad de importar fuera de Canarias por tu cuenta.
          <br><br>
          <strong>Como comprar en SWAGSCORD:</strong><br>
          Actualmente trabajamos bajo pedido. Para adquirir cualquier producto, puedes contactar con nosotros a traves
          de WhatsApp, llamada telefonica o correo electronico. En la seccion de Contacto y en el pie de pagina
          encontraras todos nuestros canales de atencion.
          <br><br>
          <strong>Precios:</strong> Todos los precios mostrados incluyen el IGIC (Impuesto General Indirecto Canario).
          No se aplica IVA al tratarse de un negocio establecido en Canarias.
        </div>
      </div>
    </div>

    <div class="sec-sostenibilidad">
      <div class="d-flex justify-content-center align-items-center">
        <div class="sobre-swagscord text-center" style=" margin-top: 0px; ">
          <strong>COMPROMISO SOSTENIBLE <br>-<br> SWAGSCORD x Cáritas</strong><br><br>
          En SWAGSCORD creemos que el estilo también puede cambiar vidas. Por eso, colaboramos con Cáritas Diocesana de
          Canarias para darle una segunda vida a la ropa que ya no usas. A través de sus rastros solidarios, las prendas
          recolectadas se ponen a la venta a precios simbólicos, y los fondos recaudados se destinan íntegramente a
          programas de ayuda para personas en situación de vulnerabilidad en las islas [citation:2][citation:4].
          <br><br>
          ¿Tienes ropa o calzado en buen estado? Contáctanos y la recogemos sin coste. Tu armario puede ser el punto de
          partida para una cadena de solidaridad.
        </div>
      </div>
    </div>

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