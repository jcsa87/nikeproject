<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Tus estilos personalizados (ajusta la ruta si los tienes en assets/css/) -->
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">


<div class="container py-5">
    <h1 class="mb-4">Administrar Stock</h1>
    <a href="<?= base_url('/Admin/adminPage') ?>" class="btn btn-secondary mb-3">Volver al panel</a>
    <!-- Tabla de productos para administrar stock -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="<?= $producto['activo'] == 0 ? 'text-danger' : '' ?>"><?= esc($producto['id_producto']) ?></td>
                        <td class="<?= $producto['activo'] == 0 ? 'text-danger' : '' ?>"><?= esc($producto['nombre']) ?></td>
                        <td class="<?= $producto['activo'] == 0 ? 'text-danger' : '' ?>"><?= esc($producto['categoria_nombre']) ?></td>
                        <td class="<?= $producto['activo'] == 0 ? 'text-danger' : '' ?>"><?= esc($producto['cantidad']) ?></td>
                    <td>
                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                            <?php if ($producto['activo'] == 1): ?>
                            <form action="<?= base_url('/Admin/deleteProduct/' . $producto['id_producto']) ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Seguro que quieres desactivar este producto?');">
                                <button type="submit" class="btn btn-sm btn-danger">Desactivar</button>
                            </form>
                            <?php endif; ?>
                            <?php if ($producto['activo'] == 0): ?>
                            <form action="<?= base_url('/Admin/activateProduct/' . $producto['id_producto']) ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Seguro que quieres activar este producto?');">
                                <button type="submit" class="btn btn-sm btn-success">Activar</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay productos registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </table>

    <div class="container py-5">
    <h1 class="mb-4">Categorías disponibles</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Categoría</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= esc($categoria['id_categoria']) ?></td>
                        <td><?= esc($categoria['nombre']) ?></td>
                        <td><?= esc($categoria['descripcion']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay categorías registradas.</td></tr>
            <?php endif; ?>
        </tbody>
         </table>

    <a href="<?= base_url('/Admin/addStock') ?>" class="btn btn-primary">Agregar producto</a>
    <a href="<?= base_url('/Admin/addCategory') ?>" class="btn btn-primary">Agregar categoría</a>
</div>
<?= $this->endSection() ?>