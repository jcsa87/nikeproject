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
                <a href="<?= base_url('/maintenance'); ?>" class="list-group-item list-group-item-action">Consultas</a> <!-- Asegúrate que esta ruta exista en tu AdminController -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="admin-card users">
                        <h4>Total Usuarios</h4>
                        <p class="display-4"><?= esc($totalUsers); ?></p>
                        <p class="text-muted">Último mes: <?= esc($userGrowthPercentage); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="admin-card products">
                        <h4>Productos Activos</h4>
                        <p class="display-4"><?= esc($totalActiveProducts); ?></p>
                        <p class="text-muted">Con stock: <?= esc($totalProductsInStock); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="admin-card sales">
                        <h4>Ventas del Mes</h4>
                        <p class="display-4">$<?= esc(number_format($monthlySales, 2)); ?></p>
                        <p class="text-muted">Objetivo: $<?= esc(number_format($salesTarget, 2)); ?></p>
                    </div>
                </div>
            </div>

            <h3 class="mb-3">Acciones Principales</h3>
            <div class="d-flex gap-3 mb-4">
                <a href="<?= base_url('/Admin/manageStock') ?>" class="btn btn-primary btn-lg">Modificar Stock</a>
                <a href="<?= base_url('/Admin/manageUsers') ?>" class="btn btn-info btn-lg">Administrar Usuarios</a>
                <a href="<?= base_url('/Admin/consultarVentas') ?>" class="btn btn-warning btn-lg">Consultar Ventas</a>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="admin-card">
                        <h3 class="mb-3">Últimos Pedidos</h3>
                        <table class="table table-hover table-admin">
                            <thead>
                                <tr>
                                    <th># Pedido</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($latestSales)): ?>
                                    <?php foreach ($latestSales as $sale): ?>
                                        <tr>
                                            <td><?= esc($sale['id_factura']); ?></td>
                                            <td><?= esc($sale['user_name'] . ' ' . $sale['user_lastname']); ?></td>
                                            <td>$<?= esc(number_format($sale['importe_total'], 2)); ?></td>
                                            <td><span class="badge bg-<?= ($sale['estado'] == 'completado') ? 'success' : (($sale['estado'] == 'pendiente') ? 'warning text-dark' : 'info'); ?>"><?= esc(ucfirst($sale['estado'])); ?></span></td>
                                            <td><?= esc(date('Y-m-d H:i', strtotime($sale['fecha_hora']))); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No hay pedidos recientes.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <a href="<?= base_url('/Admin/consultarVentas') ?>" class="btn btn-outline-secondary btn-sm mt-3">Ver todos los pedidos</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="admin-card">
                        <h3 class="mb-3">Nuevas Consultas de Usuarios</h3>
                        <table class="table table-hover table-admin">
                            <thead>
                                <tr>
                                    <th>ID Consulta</th>
                                    <th>Usuario</th>
                                    <th>Asunto</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($latestConsultas)): ?>
                                    <?php foreach ($latestConsultas as $consulta): ?>
                                        <tr>
                                            <td><?= esc($consulta['id_consulta']); ?></td>
                                            <td>
                                                <?php if (!empty($consulta['user_name'])): ?>
                                                    <?= esc($consulta['user_name'] . ' ' . $consulta['user_lastname']); ?>
                                                <?php else: ?>
                                                    Desconocido (ID: <?= esc($consulta['id_usuario']); ?>)
                                                <?php endif; // <<< --- CORRECCIÓN AQUÍ (faltaba este endif;) 
                                                ?>
                                            </td>
                                            <td><?= esc($consulta['asunto']); ?></td>
                                            <td><?= esc(date('Y-m-d H:i', strtotime($consulta['fecha_hora']))); ?></td>
                                            <td><a href="<?= base_url('/Admin/viewConsulta/' . $consulta['id_consulta']); ?>" class="btn btn-sm btn-outline-primary">Ver</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No hay consultas recientes.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <a href="<?= base_url('/maintenance') ?>" class="btn btn-outline-secondary btn-sm mt-3">Ver todas las consultas</a>
                    </div>
                </div>
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