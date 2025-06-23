<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/carrito.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="carrito-container">
    <h1>🛒 Mi Carrito</h1>

    <?php if (empty($carrito)) : ?>
        <p class="text-center">Tu carrito está vacío 😢</p>
        <div class="text-center mt-4">
            <a href="<?= base_url('producto/catalogo') ?>" class="btn">Volver al catálogo</a>
        </div>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($carrito as $item): ?>
                    <tr>
                        <td><?= esc($item['nombre']) ?></td>
                        <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                        <td><?= $item['cantidad'] ?></td>
                        <td>$<?= number_format($item['precio'] * $item['cantidad'], 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('carrito/eliminar/' . $item['id_producto']) ?>" class="btn btn-sm btn-danger">
                                ✖
                            </a>
                        </td>
                    </tr>
                    <?php $total += $item['precio'] * $item['cantidad']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total: $<?= number_format($total, 0, ',', '.') ?></h3>

        <div class="actions">
            <a href="<?= base_url('carrito/vaciar') ?>" class="btn btn-outline-light">🗑 Vaciar carrito</a>
            <a href="<?= base_url('producto/catalogo') ?>" class="btn btn-outline-light">🔙 Seguir comprando</a>
            <a href="<?= base_url('carrito/checkout') ?>" class="btn">✅ Finalizar compra</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
