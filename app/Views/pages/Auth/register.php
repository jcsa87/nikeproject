<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/register.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>" />
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>

    

    <div class="background-overlay"></div>

    <div class="card-container">
        <div class="register-card">
            <!-- Logo centrado -->
            <div class="logo-wrapper">
                <a href="<?= base_url('/') ?>">
                    <img src="<?= base_url('assets/img/New Project.png') ?>" alt="Volver al inicio">
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
                    <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>" placeholder="Juan" required />
                    <?php if (session('errors.nombre')): ?>
                        <small class="text-danger"><?= esc(session('errors.nombre')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?= old('apellido') ?>" placeholder="Pérez" required />
                    <?php if (session('errors.apellido')): ?>
                        <small class="text-danger"><?= esc(session('errors.apellido')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="<?= old('email') ?>" placeholder="nombre@ejemplo.com" required />
                    <?php if (session('errors.email')): ?>
                        <small class="text-danger"><?= esc(session('errors.email')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="email_confirm">Confirmar correo electrónico</label>
                    <input type="email" id="email_confirm" name="email_confirm" value="<?= old('email_confirm') ?>" placeholder="nombre@ejemplo.com" required />
                    <?php if (session('errors.email_confirm')): ?>
                        <small class="text-danger"><?= esc(session('errors.email_confirm')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="telefono">Teléfono <span class="opcional">(Opcional)</span></label>
                    <input type="tel" id="telefono" name="telefono" value="<?= old('telefono') ?>" placeholder="+54 9 11 2345 6789" />
                    <?php if (session('errors.telefono')): ?>
                        <small class="text-danger"><?= esc(session('errors.telefono')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group password-wrapper">
                    <label for="password">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Crea una contraseña segura" required />
                        <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                    </div>
                    <?php if (session('errors.password')): ?>
                        <small class="text-danger"><?= esc(session('errors.password')) ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group password-wrapper">
                    <label for="password_confirm">Confirmar contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="Repetí la contraseña" required />
                        <i class="bi bi-eye-slash toggle-password" id="togglePasswordConfirm"></i>
                    </div>
                    <?php if (session('errors.password_confirm')): ?>
                        <small class="text-danger"><?= esc(session('errors.password_confirm')) ?></small>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-register">Registrarme</button>

                <div class="extra-links">
                    <a href="<?= base_url('/Auth/Login') ?>">¿Ya tenés cuenta? Iniciar sesión</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JS para mostrar/ocultar contraseña -->
    <script>
        function setupTogglePassword(inputId, toggleId) {
            const toggle = document.querySelector(`#${toggleId}`);
            const input = document.querySelector(`#${inputId}`);

            toggle.addEventListener('click', () => {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                toggle.classList.toggle('bi-eye');
                toggle.classList.toggle('bi-eye-slash');
            });
        }

        setupTogglePassword('password', 'togglePassword');
        setupTogglePassword('password_confirm', 'togglePasswordConfirm');
    </script>

</body>
</html>
