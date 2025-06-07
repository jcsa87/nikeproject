<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">

    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <?= $this->renderSection('styles') ?>
</head>

<body>

    <!-- navbar -->
     <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Volver al inicio</a>
            <span class="navbar-text fw-bold">Panel de Administración</span>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Gestión de administrador</h1>
        <div class="d-flex gap-3">
            <a href="<?= base_url('/Admin/manageStock'); ?>" class="btn btn-primary btn-lg">Agregar Stock</a>
            <a href="<?= base_url('/Admin/manageUsers'); ?>" class="btn btn-seconday btn-lg">Administrar Usuarios</a>
        </div>
    </div>

    <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>