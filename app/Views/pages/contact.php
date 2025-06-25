
<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/terms_uses_style.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>


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