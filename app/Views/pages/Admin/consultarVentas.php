<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">


<div class="container py-5">
    <h2>Ventas realizadas</h2>
    <?php if (empty($facturas)): ?>
        <p>No hay ventas registradas.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Factura</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura): ?>
                    <tr>
                        <td><?= esc($factura['id_factura']) ?></td>
                        <td><?= esc($factura['usuario']['nombre'] ?? 'Usuario eliminado') ?></td>
                        <td><?= esc($factura['fecha_hora']) ?></td>
                        <td>$<?= number_format($factura['importe_total'], 2, ',', '.') ?></td>
                        <td><?= esc($factura['estado']) ?></td>
                        <td>
                            <a href="<?= base_url('factura/ver/' . $factura['id_factura']) ?>" class="btn btn-sm btn-info">Ver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?= $this->endSection() ?>