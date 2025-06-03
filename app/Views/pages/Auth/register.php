<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/register.css') ?>" />
</head>
<body>
    <div class="register-container">
        <form class="register-form" method="post" action="<?= base_url('/Auth/doRegister') ?>">
            <h2>Crear Cuenta</h2>

            <div class="input-group">
                <label for="first_name">Nombre</label>
                <input type="text" id="first_name" name="first_name" placeholder="Juan" required />
            </div>

            <div class="input-group">
                <label for="last_name">Apellido</label>
                <input type="text" id="last_name" name="last_name" placeholder="Pérez" required />
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
                <label for="phone">Teléfono <span class="opcional">(Opcional)</span></label>
                <input type="tel" id="phone" name="phone" placeholder="+54 9 11 2345 6789" />
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Crea una contraseña segura" required />
            </div>

            <button type="submit" class="btn-register">Registrarme</button>

            <div class="extra-links">
                <a href="<?= base_url('/Auth/login') ?>">¿Ya tenés cuenta? Iniciar sesión</a>
            </div>
        </form>
    </div>
</body>
</html>
