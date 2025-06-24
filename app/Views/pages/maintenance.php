<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">
    
    <title>Mantenimiento - Nike Corrientes</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/maintenance_style.css'); ?>">
</head>
<body>
    <div class="maintenance-container">
        <h1>¡Volveremos pronto!</h1>
        <p>Estamos realizando tareas de mantenimiento para mejorar tu experiencia. Por favor, vuelve más tarde.</p>
        <img src="<?= base_url('assets/img/maintenance/nike-2-logo-svg-vector.svg'); ?>" alt="Mantenimiento" class="maintenance-image">
        
        <?php
        // Determina la URL de redirección basada en el rol del usuario
        $redirectUrl = base_url('/'); // URL por defecto para usuarios no admin o no logueados

        if (session()->get('logged_in') && strtolower(session()->get('user_rol')) === 'admin') {
            $redirectUrl = base_url('/Admin/adminPage'); // Redirige a adminPage si es admin
        }
        ?>
        
        <a href="<?= esc($redirectUrl); ?>" class="btn-home">Volver al Inicio</a>
    </div>
</body>
</html>
