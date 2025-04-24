<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\pages\home.php -->
<?= $this->extend('templates/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/terms_uses_style.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-left">Términos y Condiciones de Uso</h1>
    <p>POR FAVOR LEA ESTE DOCUMENTO CUIDADOSAMENTE Y NO OPERE EN LA PLATAFORMA WWW.NIKE.COM.AR (LA "PLATAFORMA") SI NO ESTÁ DE ACUERDO CON SUS TÉRMINOS Y CONDICIONES DE USO ("TÉRMINOS").

Estos Términos describen las reglas aplicables al uso de un sitio web, experiencia digital, una plataforma de medios sociales, una aplicación móvil, una tecnología portátil o uno de nuestros otros productos o servicios, todos los cuales forman parte de la Plataforma.

Usted puede acceder a la Plataforma a través de una computadora, teléfono móvil, tableta, consola u otra tecnología similar (“Dispositivo”). Las tarifas y gastos de su empresa de telecomunicaciones se aplican a su Dispositivo y están a su cargo.</p>
    <div class="accordion" id="termsAccordion">
        <!-- Item 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1. Aceptación de los Términos
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    Al acceder y utilizar este sitio web, aceptas cumplir con estos términos y condiciones. Si no estás de acuerdo con alguno de los términos, no debes utilizar este sitio.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2. Uso Permitido
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    Este sitio web está destinado únicamente para uso personal y no comercial. No puedes copiar, distribuir, modificar o utilizar el contenido sin autorización previa.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3. Propiedad Intelectual
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    Todos los derechos de propiedad intelectual, incluidos textos, imágenes y logotipos, son propiedad de la empresa y están protegidos por las leyes aplicables.
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    4. Limitación de Responsabilidad
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    No nos hacemos responsables de daños directos o indirectos derivados del uso de este sitio web o de la imposibilidad de acceder al mismo.
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    5. Modificaciones de los Términos
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios serán efectivos una vez publicados en este sitio web.
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-5">
        <p>&copy; 2025 Tu Empresa. Todos los derechos reservados.</p>
    </footer>
</div>

<?= $this->endSection() ?>