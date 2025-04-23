<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nike Corrientes</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS externo -->
  <link rel="stylesheet" href="assets/css/homestyle.css">
</head>
<body>

  <!-- BARRA SUPERIOR -->
  <div class="topbar d-flex justify-content-between align-items-center px-4 py-1">
    <div class="topbar-left">
      <img src="assets/img/logojordan2.jpg" alt="Jordan Logo" height="24">
    </div>
    <div class="topbar-right d-flex gap-3">
      <a href="#">Suscribite</a>
      <span>|</span>
      <a href="#">Buscar tienda</a>
      <span>|</span>
      <a href="#">RUN BUE</a>
      <span>|</span>
      <a href="#">Ayuda</a>
    </div>
  </div>

  <!-- BARRA DE NAVEGACIÓN -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logitosinplb.jpg" alt="Logo">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Hombre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mujer</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Niño/a</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Accesorios</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-buscar" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- SECCIÓN DE IMAGEN DE FONDO -->
  <section class="imagen-fondo">
    <div class="contenido-imagen">
      <h1>Estilo que te mueve</h1>
      <p>Descubrí nuestra colección exclusiva que combina diseño, comodidad y tecnología.</p>
      <button>Ver colección</button>
    </div>
  </section>

  <!-- CARRUSEL DE PRODUCTOS ESTILO MOBILE -->
  <section id="carrusel-productos" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Productos Recomendados</h2>
      
      <div class="carousel-wrapper position-relative">
        <!-- Botón anterior -->
        <button class="btn-carousel prev" onclick="scrollCarrusel('left')">&#10094;</button>

        <!-- Contenedor del carrusel -->
        <div class="carousel-container" id="carousel-scroll">
          <!-- Producto 1 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/airmaxalpha.jpg" class="card-img-top" alt="Air Max Alpha">
            <div class="card-body text-center">
              <h5 class="card-title">Air Max Alpha</h5>
              <p class="card-text">$89.999</p>
            </div>
          </div>
          <!-- Producto 2 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikerevolution.jpg" class="card-img-top" alt="Nike Revolution">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Revolution</h5>
              <p class="card-text">$76.500</p>
            </div>
          </div>
          <!-- Producto 3 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikepegasus.jpg" class="card-img-top" alt="Nike Pegasus">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Pegasus</h5>
              <p class="card-text">$105.000</p>
            </div>
          </div>
          <!-- Producto 4 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikeblazermid.jpg" class="card-img-top" alt="Nike Blazer Mid">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Blazer Mid</h5>
              <p class="card-text">$92.000</p>
            </div>
          </div>
          <!-- Producto 5 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikefreerun.jpg" class="card-img-top" alt="Nike Free Run">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Free Run</h5>
              <p class="card-text">$84.500</p>
            </div>
          </div>
          <!-- Producto 6 -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikeinfinity.jpg" class="card-img-top" alt="Nike Infinity React">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Infinity React</h5>
              <p class="card-text">$110.000</p>
            </div>
          </div>
          <!-- Producto 7 (recomendado por mí) -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/jordanretro.jpg" class="card-img-top" alt="Jordan Retro 1">
            <div class="card-body text-center">
              <h5 class="card-title">Jordan Retro 1</h5>
              <p class="card-text">$125.000</p>
            </div>
          </div>
          <!-- Producto 8 (recomendado por mí) -->
          <div class="card mx-2" style="min-width: 250px;">
            <img src="assets/img/nikeairforce.jpg" class="card-img-top" alt="Nike Air Force 1">
            <div class="card-body text-center">
              <h5 class="card-title">Nike Air Force 1</h5>
              <p class="card-text">$98.000</p>
            </div>
          </div>
        </div>

        <!-- Botón siguiente -->
        <button class="btn-carousel next" onclick="scrollCarrusel('right')">&#10095;</button>
      </div>
    </div>
  </section>

  <!-- Script para scroll -->
  <script>
    function scrollCarrusel(direction) {
      const container = document.getElementById('carousel-scroll');
      const scrollAmount = 300;
      if (direction === 'left') {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
      } else {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      }
    }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
