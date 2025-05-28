<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="container my-5" style="max-width: 400px;">

    <h2 class="mb-4 text-center">Iniciar Sesión</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        <div class="container-fluid text-center pt-3">
            <a class="blue">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="container-fluid text-center pt-4">
        <button onclick="window.location.href='<?= base_url('/register') ?>'" type="submit" class="btn btn-success">Crear Cuenta</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>