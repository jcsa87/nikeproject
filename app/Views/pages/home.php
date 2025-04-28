<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="assets/css/homestyle.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- SECCIÓN DE IMAGEN DE FONDO -->
<section class="imagen-fondo">
  <div class="contenido-imagen">
    <h1>ESTILO QUE TE MUEVE</h1>
    <p>DESCUBRI NUESTRA COLECCIÓN EXCLUSIVA QUE COMBINA DISEÑO, COMODIDAD Y TECNOLOGIA</p>
    <button onclick="document.getElementById('carrusel-productos').scrollIntoView({ behavior: 'smooth' })">
      Ver colección
    </button>
  </div>
</section>

<!-- SECCIÓN INSPIRADORA CON IMAGEN DE FONDO Y TEXTO -->
<section class="seccion-inspiradora">
  <div class="contenido-inspirador">
    <h2>JUEGA COMO UN CAMPEÓN</h2>
    <p>EQUÍPATE CON LO MEJOR PARA LA TEMPORADA</p>
  </div>
</section>

<!-- CARRUSEL DE BOTINES NIKE -->
<section class="py-5">
  <div class="container">
    <h2 class="text-left mb-4">BOTINES NIKE</h2>

    <div class="carousel-wrapper position-relative">
      <button class="btn-carousel prev" onclick="scrollCarruselNike('left')">&#10094;</button>

      <div class="carousel-container" id="carousel-nike">
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikephantom.jpg" class="card-img-top" alt="Botín Nike 1">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Phantom GX</h5>
            <p class="card-text">$119.000</p>
          </div>
        </div>
        <div class="card mx-2 producto-card">
          <img src="assets/img/niketiempo.jpg" class="card-img-top" alt="Botín Nike 2">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Tiempo Legend</h5>
            <p class="card-text">$125.000</p>
          </div>
        </div>
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikemercurial.jpg" class="card-img-top" alt="Botín Nike 3">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Mercurial Superfly</h5>
            <p class="card-text">$132.500</p>
          </div>
        </div>
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikevapor.jpg" class="card-img-top" alt="Botín Nike 4">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Vapor Edge</h5>
            <p class="card-text">$115.000</p>
          </div>
        </div>
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikezoom.jpg" class="card-img-top" alt="Botín Nike 5">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Zoom Mercurial</h5>
            <p class="card-text">$128.000</p>
          </div>
        </div>
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikepremier.jpg" class="card-img-top" alt="Botín Nike 6">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Premier</h5>
            <p class="card-text">$109.500</p>
          </div>
        </div>
      </div>

      <button class="btn-carousel next" onclick="scrollCarruselNike('right')">&#10095;</button>
    </div>
  </div>
</section>

<script>
  function scrollCarruselNike(direction) {
    const container = document.getElementById('carousel-nike');
    const scrollAmount = 300;
    if (direction === 'left') {
      container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
  }
</script>


<section class="imagen-jordan">
  <div class="contenido-jordan">
    <h2>DESCUBRI LA ESENCIA DE JORDAN</h2>
    <p>ESTILO Y RENDIMIENTO LEGENDARIO</p>
    <button onclick="window.location.href='<?= base_url('/maintenance') ?>'">Explorar Jordan</button>
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
        <div class="card mx-2 producto-card">
          <img src="assets/img/airmaxalpha.jpg" class="card-img-top" alt="Air Max Alpha">
          <div class="card-body text-center">
            <h5 class="card-title">Air Max Alpha</h5>
            <p class="card-text">$89.999</p>
          </div>
        </div>
        <!-- Producto 2 -->
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikerevolution.jpg" class="card-img-top" alt="Nike Revolution">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Revolution</h5>
            <p class="card-text">$76.500</p>
          </div>
        </div>
        <!-- Producto 3 -->
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikepegasus.jpg" class="card-img-top" alt="Nike Pegasus">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Pegasus</h5>
            <p class="card-text">$105.000</p>
          </div>
        </div>
        <!-- Producto 4 -->
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikeblazermid.jpg" class="card-img-top" alt="Nike Blazer Mid">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Blazer Mid</h5>
            <p class="card-text">$92.000</p>
          </div>
        </div>
        <!-- Producto 5 -->
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikefreerun.jpg" class="card-img-top" alt="Nike Free Run">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Free Run</h5>
            <p class="card-text">$84.500</p>
          </div>
        </div>
        <!-- Producto 6 -->
        <div class="card mx-2 producto-card">
          <img src="assets/img/nikeinfinity.jpg" class="card-img-top" alt="Nike Infinity React">
          <div class="card-body text-center">
            <h5 class="card-title">Nike Infinity React</h5>
            <p class="card-text">$110.000</p>
          </div>
        </div>
        <!-- Producto 7-->
        <div class="card mx-2 producto-card">
          <img src="assets/img/jordanretro.jpg" class="card-img-top" alt="Jordan Retro 1">
          <div class="card-body text-center">
            <h5 class="card-title">Jordan Retro 1</h5>
            <p class="card-text">$125.000</p>
          </div>
        </div>
        <!-- Producto 8 -->
        <div class="card mx-2 producto-card">
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

<section class="video-section">
  <h2 class="titulo-video">LO MAS NUEVO</h2>

  <div class="video-container">
    <iframe src="https://www.youtube.com/embed/vtc1JpKrWHk" 
      title="YouTube video player" frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
      allowfullscreen>
    </iframe>
  </div>
</section>


<?= $this->endSection() ?>

