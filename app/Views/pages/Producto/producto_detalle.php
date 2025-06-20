<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">


<div class="container py-5">
    <div class="row">
        <div class="col-md-6">

            <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="img-fluid" alt="<?= esc($producto['nombre']) ?>">
        </div>
        <div class="col-md-6">
            <h2><?= esc($producto['nombre']) ?></h2>

            <?php if ($producto['activo'] == 0 || $producto['cantidad'] == 0 ): ?>
                <p class="text-danger">PRODUCTO NO DISPONIBLE</p>
            <?php else: ?>
                <p class="text-success">PRODUCTO DISPONIBLE</p>
            <?php endif; ?>
            
            <h4 class="text-success">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>
            <p><?= esc($producto['descripcion']) ?></p>
            <p><strong>Tipo:</strong> <?= esc($producto['categoria_nombre']) ?></p>
            <p><strong>Sexo:</strong> <?= esc($producto['sexo']) ?></p>
            <p><strong>Talle:</strong> <?= esc($producto['talle']) ?></p>
            <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">Volver al inicio</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?= $this->endSection() ?>