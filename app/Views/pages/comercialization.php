<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\pages\home.php -->
<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/terms_uses_style.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/img/logitosinplb.jpg') ?>" alt="Logo" style="height:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSimple"
            aria-controls="navbarSimple" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSimple">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/comercialization') ?>">Comercialización</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact') ?>">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h2 class="text-center mb-4">Comercialización</h2>
    <p class="text-center">En Nike, nos comprometemos a ofrecer productos de alta calidad y a garantizar una experiencia de compra excepcional para nuestros clientes. A continuación, te presentamos información clave sobre nuestra política de comercialización:</p>

    <div class="row mt-4">
        <!-- Distribución -->
        <div class="col-md-4 text-center">
            <h4>Distribución</h4>
            <p>Trabajamos con una red global de distribuidores autorizados para garantizar que nuestros productos lleguen a todos los rincones del mundo.</p>
        </div>

        <!-- Tiendas físicas -->
        <div class="col-md-4 text-center">
            <h4>Tiendas Físicas</h4>
            <p>Visita nuestras tiendas oficiales para explorar la última colección de productos Nike. Encuentra la tienda más cercana <a href="<?= base_url('/maintenance'); ?>">aquí</a>.</p>
        </div>

        <!-- Tienda online -->
        <div class="col-md-4 text-center">
            <h4>Tienda Online</h4>
            <p>Compra desde la comodidad de tu hogar en nuestra tienda online oficial. Ofrecemos envíos rápidos y seguros a nivel nacional e internacional.</p>
        </div>
    </div>

    <!-- Políticas de comercialización -->
    <div class="mt-5">
        <h4 class="text-center">Políticas de Comercialización</h4>
        <ul class="list-group mt-3">
            <li class="list-group-item">Garantizamos la autenticidad de todos nuestros productos.</li>
            <li class="list-group-item">Ofrecemos devoluciones y cambios dentro de los 30 días posteriores a la compra.</li>
            <li class="list-group-item">Promociones y descuentos están sujetos a términos y condiciones específicos.</li>
            <li class="list-group-item">Trabajamos con proveedores éticos y sostenibles para minimizar nuestro impacto ambiental.</li>
        </ul>
    </div>

    <!-- Contacto para mayoristas -->
    <div class="mt-5">
        <h4 class="text-center">¿Eres un mayorista?</h4>
        <p class="text-center">Si estás interesado en distribuir productos Nike, contáctanos a través de nuestro correo electrónico: <strong>mayoristas@nike.com</strong>.</p>
    </div>
</div>

<?= $this->endSection() ?>