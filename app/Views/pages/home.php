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
    <?php if (!empty($botines)): ?>
        <?php foreach ($botines as $producto): ?>
            <a href="<?= base_url('producto/' . $producto['id_producto']) ?>" class="text-decoration-none text-dark">
                <div class="card mx-2 producto-card">
                    <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                        <p class="card-text">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
                    </div>
                </div>
            </a>
          <?php endforeach; ?>
          <?php else: ?>
            <p>No hay botines disponibles.</p>
        <?php endif; ?>
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
        <?php if(!empty($calzados)): ?>
          <?php foreach($calzados as $producto): ?>
         <a href="<?= base_url('producto/' . $producto['id_producto']) ?>" class="text-decoration-none text-dark">
              <div class="card mx-2 producto-card">
               <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                 <div class="card-body text-center">
                  <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                <p class="card-text">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
              </div>
          </div>
        </a>
<?php endforeach; ?>
        <?php else: ?>
          <p>No hay productos recomendados.</p>
        <?php endif; ?>
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

