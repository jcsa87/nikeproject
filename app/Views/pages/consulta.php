<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/terms_uses_style.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Centro de Consultas</h2>
    <p class="text-center">¿Tienes alguna pregunta o necesitas ayuda? Completa el formulario o contáctanos por los siguientes medios:</p>

    <div class="row mt-4">
        <div class="col-md-4 text-center">
            <h4>Teléfono</h4>
            <p><strong>0800-123-NIKE (6453)</strong></p>
            <p>Lunes a Viernes, de 9:00 a 18:00</p>
        </div>
        <div class="col-md-4 text-center">
            <h4>Email</h4>
            <p><strong>soporte@nike.com</strong></p>
            <p>Respondemos en 24 a 48 horas.</p>
        </div>
        <div class="col-md-4 text-center">
            <h4>Redes Sociales</h4>
            <p>
                <a href="https://www.facebook.com/nike" target="_blank">Facebook</a> |
                <a href="https://www.instagram.com/nike" target="_blank">Instagram</a> |
                <a href="https://www.twitter.com/nike" target="_blank">Twitter</a>
            </p>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="text-center">Envíanos tu consulta</h4>
        <form class="mt-4" method="post" action="<?= base_url('/consulta/enviar') ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?= esc(session('user_name') ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?= esc(session('user_email') ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu consulta aquí" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar Consulta</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>