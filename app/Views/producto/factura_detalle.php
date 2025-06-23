<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5" id="factura">
    <h2>Factura N° <?= esc($factura['id_factura']) ?></h2>
    <p><strong>Fecha:</strong> <?= esc($factura['fecha_hora']) ?></p>
    <p><strong>Método de pago:</strong> <?= esc($factura['medio_pago']) ?></p>
    <p><strong>Método de entrega:</strong> <?= esc($factura['metodo_entrega']) ?></p>
    <p><strong>Estado:</strong> <?= esc($factura['estado']) ?></p>
    <hr>
    <h4>Detalle</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?= esc($detalle['producto']['nombre'] ?? 'Producto eliminado') ?></td>
                    <td><?= esc($detalle['cantidad']) ?></td>
                    <td>$<?= number_format($detalle['subtotal'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <h4>Total: $<?= number_format($factura['importe_total'], 2, ',', '.') ?></h4>
    <button class="btn btn-secondary mt-3" onclick="window.print()">Imprimir factura</button>
    <a href="<?= base_url('producto/catalogo') ?>" class="btn btn-primary mt-3">Volver al catálogo</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<?= $this->endSection() ?>