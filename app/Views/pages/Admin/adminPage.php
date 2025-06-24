<?= $this->extend('templates/main') ?>

<?= $this->section('title') ?>
Panel de Administración - Nike Store
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/adminPage.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="main-container container-fluid">
    <h1 class="mb-4">Panel de Administración</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-4">
                <a href="<?= base_url('/Admin/adminPage') ?>" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="<?= base_url('/Admin/manageStock') ?>" class="list-group-item list-group-item-action">Productos</a>
                <a href="<?= base_url('/Admin/manageUsers') ?>" class="list-group-item list-group-item-action">Usuarios</a>
                <a href="<?= base_url('/Admin/consultarVentas'); ?>" class="list-group-item list-group-item-action">Ventas</a>
                <a href="<?= base_url('/maintenance'); ?>" class="list-group-item list-group-item-action">Consultas</a> <!-- Se mantiene apuntando a /maintenance -->
            </div>
        </div>
        <div class="col-md-9">
            <!-- Las secciones de "Total Usuarios", "Productos Activos" y "Ventas del Mes" han sido eliminadas -->
            <!-- Las secciones de "Últimos Pedidos" y "Nuevas Consultas de Usuarios" también han sido eliminadas -->

            <h3 class="mb-3">Acciones Principales</h3>
            <div class="d-flex gap-3 mb-4">
                <a href="<?= base_url('/Admin/manageStock') ?>" class="btn btn-primary btn-lg">Modificar Stock</a>
                <a href="<?= base_url('/Admin/manageUsers') ?>" class="btn btn-info btn-lg">Administrar Usuarios</a>
                <a href="<?= base_url('/Admin/consultarVentas') ?>" class="btn btn-warning btn-lg">Consultar Ventas</a>
            </div>
            
            <p class="mt-4">Bienvenido al panel de administración. Aquí puedes gestionar las operaciones principales de la tienda.</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    console.log("Panel de administración cargado y listo para datos dinámicos.");
</script>
<?= $this->endSection() ?>