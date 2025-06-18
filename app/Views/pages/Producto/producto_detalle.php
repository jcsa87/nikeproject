<?php
<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            // <!-- Cambia 'imagen' por el nombre real del campo si lo tienes -->
            <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="img-fluid" alt="<?= esc($producto['nombre']) ?>">
        </div>
        <div class="col-md-6">
            <h2><?= esc($producto['nombre']) ?></h2>
            <p class="text-muted"><?= esc($producto['categoria_nombre']) ?></p>
            <h4 class="text-success">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>
            <p><?= esc($producto['descripcion']) ?></p>
            <p><strong>Stock:</strong> <?= esc($producto['cantidad']) ?></p>
            <p><strong>Talle:</strong> <?= esc($producto['talle']) ?></p>
            <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">Volver al inicio</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>