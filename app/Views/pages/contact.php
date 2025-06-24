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
    <h2 class="text-center mb-4">¿En qué podemos ayudarte?</h2>
    <p class="text-center">Estamos aquí para responder tus preguntas y ayudarte con cualquier consulta que tengas. Puedes contactarnos a través de los siguientes medios:</p>

    <div class="row mt-4">
        <!-- Contacto por teléfono -->
        <div class="col-md-4 text-center">
            <h4>Teléfono</h4>
            <p>Llámanos al:</p>
            <p><strong>0800-123-NIKE (6453)</strong></p>
            <p>Horario de atención: Lunes a Viernes, de 9:00 a 18:00</p>
        </div>

        <!-- Contacto por correo -->
        <div class="col-md-4 text-center">
            <h4>Correo Electrónico</h4>
            <p>Envíanos un correo a:</p>
            <p><strong>soporte@nike.com</strong></p>
            <p>Responderemos en un plazo de 24 a 48 horas.</p>
        </div>

        <!-- Contacto por redes sociales -->
        <div class="col-md-4 text-center">
            <h4>Redes Sociales</h4>
            <p>Encuéntranos en:</p>
            <p>
                <a href="https://www.facebook.com/nike" target="_blank">Facebook</a> | 
                <a href="https://www.twitter.com/nike" target="_blank">Twitter</a> | 
                <a href="https://www.instagram.com/nike" target="_blank">Instagram</a>
            </p>
            <p>¡Estamos disponibles para ayudarte!</p>
        </div>
    </div>

    <!-- Formulario de contacto -->
    <div class="mt-5">
        <h4 class="text-center">Envíanos un mensaje</h4>
        <form class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Tu correo electrónico" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Mensaje</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('/maintenance') ?>'">Enviar Mensaje</button>
            </div>
        </form>
    </div>

</div>

<?= $this->endSection() ?>