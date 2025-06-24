
<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5">
    <h1 class="mb-4">Agregar nuevo usuario</h1>
    <a href="<?= base_url('/Admin/manageUsers') ?>" class="btn btn-secondary mb-3">Volver a usuarios</a>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/Admin/addUser') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre') ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= old('apellido') ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono (opcional)</label>
            <input type="telefono" class="form-control" id="telefono" name="telefono" value="<?= old('telefono') ?>">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección (opcional)</label>
            <input type="direccion" class="form-control" id="direccion" name="direccion" value="<?= old('direccion') ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
       
        <button type="submit" class="btn btn-success">Agregar Usuario</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<?= $this->endSection() ?>