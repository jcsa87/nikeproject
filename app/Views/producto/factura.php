<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5">
    <h2>¡Gracias por tu compra!</h2>
    <p>Tu factura ha sido generada correctamente.</p>
    <p>Número de factura: <strong><?= esc($factura_id) ?></strong></p>
    <a href="<?= base_url('producto/catalogo') ?>" class="btn btn-primary mt-3">Volver al catálogo</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?= $this->endSection() ?>