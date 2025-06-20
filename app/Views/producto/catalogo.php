<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5">
    <h1 class="mb-4">Catálogo de Productos</h1>

    <!-- Filtros -->
    <form method="get" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Categoría</label>
            <select name="categoria" class="form-select">
                <option value="">Todas</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id_categoria'] ?>" <?= ($filtros['categoria'] == $cat['id_categoria']) ? 'selected' : '' ?>>
                        <?= esc($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Precio mínimo</label>
            <input type="number" name="min_precio" class="form-control" value="<?= esc($filtros['min_precio']) ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Precio máximo</label>
            <input type="number" name="max_precio" class="form-control" value="<?= esc($filtros['max_precio']) ?>">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="disponible" value="1" <?= ($filtros['disponible'] == '1') ? 'checked' : '' ?>>
                <label class="form-check-label">Solo disponibles</label>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <!-- Listado de productos -->
    <div class="row">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <a href="<?= base_url('producto/' . $producto['id_producto']) ?>" class="text-decoration-none text-dark">
                            <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                                <p class="card-text"><?= esc($producto['categoria_nombre']) ?></p>
                                <p class="card-text">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
                                <p class="card-text <?= $producto['cantidad'] > 0 ? 'text-success' : 'text-danger' ?>">
                                    <?= $producto['cantidad'] > 0 ? 'Disponible' : 'Sin stock' ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>No se encontraron productos con los filtros seleccionados.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?= $this->endSection() ?>