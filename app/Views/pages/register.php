<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="container my-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Crear Cuenta</h2>
    <form>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Crea una contraseña">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Repite la contraseña">
        </div>
        <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </form>
    <div class="container-fluid text-center pt-3">
        <a href="<?= base_url('/login'); ?>">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>
<?= $this->endSection() ?>