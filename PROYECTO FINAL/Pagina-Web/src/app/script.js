/* MENU HAMBURGUESA */
/* Funcionalidad para abrir y cerrar el menu en dispositivos moviles */
document.addEventListener("DOMContentLoaded", function () {
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  const navMenu = document.getElementById("navMenu");

  hamburgerBtn.addEventListener("click", function () {
    navMenu.classList.toggle("active");
    hamburgerBtn.classList.toggle("active");
  });

  const navLinks = document.querySelectorAll(".nav-link");
  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      if (navMenu.classList.contains("active")) {
        navMenu.classList.remove("active");
        hamburgerBtn.classList.remove("active");
      }
    });
  });

  window.addEventListener("resize", function () {
    if (window.innerWidth > 768 && navMenu.classList.contains("active")) {
      navMenu.classList.remove("active");
      hamburgerBtn.classList.remove("active");
    }
  });

  /* CARROUSEL INICIO */
  /* Carrusel de la seccion de accesorios en la pagina principal */
  const slider1 = new Splide("#miSlider1", {
    type: "fade",
    autoplay: true,
    interval: 6000,
    arrows: false,
    pagination: false,
    rewind: true,
    pauseOnHover: false,
    pauseOnFocus: false,
  });
  slider1.mount();
  slider1.Components.Autoplay.play();

  /* Carrusel de la seccion de ropa en la pagina principal */
  const slider2 = new Splide("#miSlider2", {
    type: "fade",
    autoplay: true,
    interval: 4000,
    arrows: false,
    pagination: false,
    rewind: true,
    pauseOnHover: false,
    pauseOnFocus: false,
  });
  slider2.mount();
  slider2.Components.Autoplay.play();
});

/* AGRANDAR TARJETAS DE PRODUCTO */
/* Efecto de agrandamiento al hacer clic en las tarjetas de producto */
document.querySelectorAll(".tarjeta-prodcuto").forEach(function (tarjeta) {
  tarjeta.addEventListener("click", function () {
    this.classList.toggle("agrandada");
  });
});
