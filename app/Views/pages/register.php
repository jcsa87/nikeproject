<?= $this->extend('templates/footer_only') ?>

<?= $this->section('content') ?>
<div class="container my-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Crear Cuenta</h2>
    <form method="post" action="<?= base_url('register') ?>">
        <div class="row mb-3">
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    <label for="nombre">Nombre</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                    <label for="apellido">Apellido</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
            <label for="direccion">Dirección</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
            <label for="telefono">Teléfono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
            <label for="email">Correo electrónico</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            <label for="password">Contraseña</label>
        </div>
        <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </form>
    <div class="container-fluid text-center pt-3">
        <a href="<?= base_url('/login'); ?>">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>
<?= $this->endSection() ?>