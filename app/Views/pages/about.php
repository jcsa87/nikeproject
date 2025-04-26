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

<div class="object-fit-contain">
    <video src="assets/img/about/NIKE_COMPANY_loop_032323.mp4" autoplay muted loop playsinline>
        Tu navegador no soporta el video.
        </video>
</div>


<?= $this->endSection() ?>