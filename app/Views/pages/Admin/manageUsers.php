<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

<div class="container py-5">
    <h1 class="mb-4">Administrar Usuarios</h1>
    <a href="<?= base_url('/Admin/adminPage') ?>" class="btn btn-secondary mb-3">Volver al panel</a>
    <!-- Tabla de usuarios -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['id_usuario']) ?></td>
                        <td><?= esc($usuario['nombre']) ?></td>
                        <td><?= esc($usuario['email']) ?></td>
                        <td><?= esc($usuario['rol']) ?></td>
                        <td><?= $usuario['activo'] ? 'Sí' : 'No' ?></td>
                        <td>
    <a href="<?= base_url('/Admin/editUser/' . $usuario['id_usuario']) ?>" class="btn btn-sm btn-warning">Editar</a>
    <?php if ($usuario['rol'] !== 'admin'): ?>
        <?php if ($usuario['activo']): ?>
            <form action="<?= base_url('/Admin/deactivateUser/' . $usuario['id_usuario']) ?>" method="post" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas desactivar este usuario?')">Desactivar</button>
            </form>
        <?php else: ?>
            <form action="<?= base_url('/Admin/activateUser/' . $usuario['id_usuario']) ?>" method="post" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('¿Seguro que deseas activar este usuario?')">Activar</button>
            </form>
        <?php endif; ?>
    <?php else: ?>
        <span class="badge bg-secondary">Admin activo</span>
    <?php endif; ?>
</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No hay usuarios registrados.</td></tr>
            <?php endif; ?>
            
            
        </tbody>
    </table>
    <a href="<?= base_url('/Admin/addUser') ?>" class="btn btn-primary">Agregar nuevo usuario</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>