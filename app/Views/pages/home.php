<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\pages\home.php -->
<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="assets/css/homestyle.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

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

<?= $this->endSection() ?>


