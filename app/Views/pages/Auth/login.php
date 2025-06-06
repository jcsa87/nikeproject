<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">

</head>
<body>
    
    <div class="login-container">
        <form class="login-form" method="post" action="<?= base_url('/Auth/doLogin') ?>">
            <h2>Iniciar Sesión</h2>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success text-center">
                            <?= session()->getFlashdata('success') ?>
                        </div>
            <?php endif; ?>
            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" class="btn-login">Ingresar</button>
            <div class="extra-links">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="button" class="btn-register" onclick="window.location.href='<?= base_url('/Auth/Register') ?>'">Crear Cuenta</button>
            </div>
        </form>
    </div>
</body>
</html>
