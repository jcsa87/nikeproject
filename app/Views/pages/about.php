<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\pages\home.php -->

<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="assets/css/aboutstyle.css">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="contenido-principal">
    <h1><strong>BIENVENIDO A
        NIKE, INC.</strong>
    </h1>
</div>

<div class="container my-4">
    <video src="assets/img/about/NIKE_COMPANY_loop_032323.mp4" autoplay muted loop playsinline>
        Tu navegador no soporta el video.
        </video>
</div>

<div class="quienes-somos">
    <h1 class="text-center">¿Quiénes somos?</h1>
    <img  class="container-fluid" src="assets/img/about/logos-brands.webp">

    <h3 class="container-fluid text-center fst-italic p-5">NIKE, Inc. es un equipo formado por las marcas Nike, Jordan y Converse impulsadas por el propósito compartido de dejar un impacto duradero.</h3>
</div>


<div class="container text-center p-5">
  <div class="row g-4">
    <div class="col bg-light">
      <p class="percentage"><strong>43%</strong></p>
      <p>de los puestos de liderazgo en NIKE están ocupados por mujeres.</p>
    </div>
    <div class="col bg-light">
      <p class="percentage"><strong>78%</strong></p>
      <p>de la energía utilizada en instalaciones propias u operadas es renovable, frente al 48% en el año fiscal 2020.</p>
    </div>
    <div class="col bg-light">
      <p class="percentage"><strong>$97.7M</strong></p>
      <p>invertidos en el año fiscal 2021 de NIKE, Inc. para generar un impacto positivo en comunidades de todo el mundo.</p>
    </div>
  </div>
</div>


<div class="container text-center p-5 leadership">
    <h2 class="mb-4 text-center">Nuestro equipo</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-sm-12">
            <img src="assets/img/fotomia.jpeg" alt="Staff Empresa" class="img-fluid rounded-circle mb-3">
            <h5>Máximo Riveros</h5> 
            <p>Director de Marketing y Comunicación</p>
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="assets/img/imagenacosta.jpg" alt="Director de Operaciones" class="img-fluid rounded-circle mb-3">
            <h5>Juan Cruz Senicen Acosta</h5> 
            <p>Gerente de Operaciones y Logística</p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>