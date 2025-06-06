<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/register.css') ?>" />
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">

</head>
<body>
    <div class="register-container">

    <!-- botón para volver a home -->
        <div style="text-align:center; margin-bottom: 20px;">
        <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/img/New Project.png') ?>" alt="Volver al inicio" style="width:250px; height:250px; cursor:pointer;">
        </a>
         </div>

    <?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session('errors') as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach ?>
    </div>
    <?php endif ?>



        <form class="register-form" method="post" action="<?= site_url('/Auth/doRegister') ?>">
            <h2>Crear Cuenta</h2>

            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Juan" required />
            </div>

            <div class="input-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Pérez" required />
            </div>

            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com" required />
            </div>

            <div class="input-group">
                <label for="email_confirm">Confirmar correo electrónico</label>
                <input type="email" id="email_confirm" name="email_confirm" placeholder="nombre@ejemplo.com" required />
            </div>

            <div class="input-group">
                <label for="telefono">Teléfono <span class="opcional">(Opcional)</span></label>
                <input type="tel" id="telefono" name="telefono" placeholder="+54 9 11 2345 6789" />
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password_hash" name="password" placeholder="Crea una contraseña segura" required />
            </div>

            <button type="submit" class="btn-register">Registrarme</button>

            <div class="extra-links">
                <a href="<?= base_url('/Auth/Login') ?>">¿Ya tenés cuenta? Iniciar sesión</a>
            </div>
        </form>
    </div>
</body>
</html>
