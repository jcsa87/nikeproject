<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5">
    <h1 class="mb-4">Editar Producto</h1>
    <a href="<?= base_url('/Admin/manageStock') ?>" class="btn btn-secondary mb-3">Volver a Stock</a>

    <?php if (isset($errors) && count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/Admin/actualizar') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_producto" value="<?= esc($producto['id_producto']) ?>">
    <!-- ...resto del formulario... -->
        <div class="mb-3">

        <?php if ($producto['activo'] == 1): ?>
            <p class="text-success text-center fw-bold">PRODUCTO ACTIVO</p>
         <?php else: ?>
            <p class="text-danger text-center fw-bold">PRODUCTO INACTIVO</p>
        <?php endif; ?>

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre', $producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id_categoria'] ?>" <?= old('id_categoria', $producto['id_categoria']) == $cat['id_categoria'] ? 'selected' : '' ?>>
                        <?= esc($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required><?= old('descripcion', $producto['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= old('precio', $producto['precio']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?= old('cantidad', $producto['cantidad']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="">Selecciona</option>
                <option value="Hombre" <?= old('sexo', $producto['sexo']) == 'Hombre' ? 'selected' : '' ?>>Hombre</option>
                <option value="Mujer" <?= old('sexo', $producto['sexo']) == 'Mujer' ? 'selected' : '' ?>>Mujer</option>
                <option value="Unisex" <?= old('sexo', $producto['sexo']) == 'Unisex' ? 'selected' : '' ?>>Unisex</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="talle" class="form-label">Talle</label>
            <input type="number" step="0.1" class="form-control" id="talle" name="talle" value="<?= old('talle', $producto['talle']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <?php if (!empty($producto['imagen'])): ?>
                <div class="mb-2">
                    <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="Imagen actual" style="max-width:120px;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<?= $this->endSection() ?>