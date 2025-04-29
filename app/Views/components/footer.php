<!-- filepath: c:\xampp\htdocs\nikeproject\app\Views\components\footer.php -->
<link rel="stylesheet" href="assets/css/footerstyle.css">

<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            
            <!-- Sección izquierda: Contacto y Políticas -->
            <div class="col-md-4 col-sm-12 mb-4 footer-left">
                <h5>Información</h5>
                <p>Dirección: Calle Roca 1437, Corrientes, Argentina</p>
                <p>Email: atencionalcliente2@southbay.com.ar</p>
                <p>Teléfono: +54 9 11 2799-6935</p>
                <h5>Políticas y más</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('/terms-uses'); ?>" class="text-white">Términos y Condiciones</a></li>
                    <li><a href="<?= base_url('/maintenance'); ?>" class="text-white">Devoluciones</a></li>
                    <li><a href="<?= base_url('/maintenance'); ?>" class="text-white">Envíos</a></li>
                </ul>
            </div>

            <!-- Sección central: Menú de navegación -->
            <div class="col-md-4 col-sm-12 mb-4 footer-center text-center">
                <h5>Menú</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('/'); ?>" class="text-white">Inicio</a></li>
                    <li><a href="<?= base_url('/about'); ?>" class="text-white">Nosotros</a></li>
                    <li><a href="<?= base_url('/comercialization'); ?>" class="text-white">Comercialización</a></li>
                    <li><a href="<?= base_url('/contact'); ?>" class="text-white">Contacto</a></li>
                </ul>
            </div>

            <!-- Sección derecha: Redes sociales -->
            <div class="col-md-4 col-sm-12 footer-right text-center">
                <h5>Síguenos</h5>
                <ul class="list-unstyled d-flex justify-content-center gap-3">
                    <li><a href="https://www.instagram.com/nike" target="_blank"><img src="assets/img/social_media/icons8-instagram-50.png" alt="Instagram" height="30"></a></li>
                    <li><a href="https://www.facebook.com/nike" target="_blank"><img src="assets/img/social_media/icons8-facebook-50.png" alt="Facebook" height="30"></a></li>
                    <li><a href="https://www.twitter.com/nike" target="_blank"><img src="assets/img/social_media/icons8-twitter-50.png" alt="Twitter" height="30"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center mt-4">
        <p>&copy; <?= date("Y"); ?> Nike Corrientes. Todos los derechos reservados.</p>
    </div>
</footer>