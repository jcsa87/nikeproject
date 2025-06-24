<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 450px; width:100%;">
        <div class="card-body text-center">

            <img src="https://thispersondoesnotexist.com/" alt="Foto de perfil" class="rounded-circle mb-3" width="120" height="120" style="object-fit:cover; border:3px solid #eee;">
            <h4 class="card-title mb-2"><?= esc($usuario['nombre']) ?> <?= esc($usuario['apellido']) ?></h4>
            <hr>
            <p class="card-text mb-1"><strong>Email:</strong> <?= esc($usuario['email']) ?></p>
            <p class="card-text mb-1"><strong>Teléfono:</strong> <?= esc($usuario['telefono'] ?? 'No especificado') ?></p>
            <p class="card-text mb-1"><strong>Dirección:</strong> <?= esc($usuario['direccion'] ?? 'No especificada') ?></p>
            <p class="card-text mb-1"><strong>ID Usuario:</strong> <?= esc($usuario['id_usuario']) ?></p>
            <p class="card-text mb-1"><strong>Estado:</strong> <?= $usuario['activo'] ? '<span class="text-success">Activo</span>' : '<span class="text-danger">Inactivo</span>' ?></p>
            <?php if ($usuario['rol'] === 'admin'): ?>
                <p class="card-text mt-3">
                    <span class="badge bg-danger fs-6">
                        🛠️ Administrador
                    </span>
                </p>
            <?php else: ?>
                <p class="card-text mt-3">
                    <span class="badge bg-primary fs-6">
                        Usuario
                    </span>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>