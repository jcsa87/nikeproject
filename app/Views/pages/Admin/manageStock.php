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
            <!-- Ejemplo de fila, reemplaza por bucle PHP -->
            <tr>
                <td>1</td>
                <td>Botín Nike</td>
                <td>Botines</td>
                <td>10</td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <!-- Fin ejemplo -->
        </tbody>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </table>
    <a href="#" class="btn btn-primary">Agregar nuevo producto</a>
</div>
<?= $this->endSection() ?>