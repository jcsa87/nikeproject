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
    <h1>¿Quiénes somos?</h1>
    <img  class="container-fluid" src="assets/img/about/logos-brands.webp">

    <h3 class="container-fluid text-center fst-italic p-5">NIKE, Inc. es un equipo formado por las marcas Nike, Jordan y Converse impulsadas por el propósito compartido de dejar un impacto duradero.</h3>
</div>


<div class="container text-center p-5">
  <div class="row">
    <div class="col">
      <strong>43%</strong>
      of NIKE’s leadership positions are held by women.
    </div>
    <div class="col">
    <strong>78%</strong>
    renewable energy in owned or operated facilities, up from 48% in FY20.
    </div>
    <div class="col">
    <strong>$97.7M</strong>
    invested in NIKE, Inc.'s fiscal year 2021 to drive positive impact in communities around the world
    </div>
  </div>
</div>



<?= $this->endSection() ?>