<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

    <div class="background-overlay"></div>

    <div class="card-container">
        <div class="login-card">
        <!-- Logo centrado -->
        <div class="logo-wrapper">
            <a href="<?= base_url('/') ?>">
                <img src="<?= base_url('assets/img/New Project.png') ?>" alt="Volver al inicio">
            </a>
        </div>

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

                <!-- Email -->
                <div class="input-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com" required value="<?= old('email') ?>">
                    <?php if (session('errors.email')): ?>
                        <small class="text-danger"><?= esc(session('errors.email')) ?></small>
                    <?php endif; ?>
                </div>

                <!-- Contraseña con ícono -->
                <div class="input-group password-wrapper">
                    <label for="password">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
                        <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                    </div>
                    <?php if (session('errors.password')): ?>
                        <small class="text-danger"><?= esc(session('errors.password')) ?></small>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-login">Ingresar</button>

                <div class="extra-links">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <button type="button" class="btn-register" onclick="window.location.href='<?= base_url('/Auth/Register') ?>'">Crear Cuenta</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS para mostrar/ocultar contraseña -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
            togglePassword.classList.toggle('bi-eye-slash');
        });
    </script>

</body>
</html>
