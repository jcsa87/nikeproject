<link rel="stylesheet" href="assets/css/navbarstyle.css">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
            <img src="assets/img/logitosinplb.jpg" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/about'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/comercialization'); ?>">Comercialización</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact'); ?>">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/terms-uses'); ?>">Términos y Condiciones</a></li>
            </ul>

            <!-- social media y sesión -->
            <div class="social-icons d-flex mb-2 mb-lg-0">
                <?php
                    $session = session();
                    var_dump($session->get());
    

                    if ($session->has('usuario')):
                ?>
                    <span class="navbar-text me-2">Bienvenido, <?= esc($session->get('usuario')) ?></span>
                    <a class="nav-link btn btn-outline-danger px-4" href="<?= base_url('/logout'); ?>">Cerrar sesión</a>
                <?php else: ?>
                    <a class="nav-link btn btn-outline-primary px-5" href="<?= base_url('/login'); ?>">Iniciar sesión</a>
                <?php endif; ?>

                <a href="https://www.instagram.com/nike" target="_blank">
                    <img src="assets/img/social_media/icons8-instagram-50.png" alt="Instagram Logo">
                </a>
                <a href="https://www.facebook.com/nike/" target="_blank">
                    <img src="assets/img/social_media/icons8-facebook-50.png" alt="Facebook Logo">
                </a>
                <a href="https://www.twitter.com/nike/" target="_blank">
                    <img src="assets/img/social_media/icons8-twitter-50.png" alt="Twitter Logo">
                </a>
            </div>
        </div>
    </div>
</nav>