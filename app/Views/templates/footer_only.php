<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Nike Corrientes' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <div>
        <?= $this->renderSection('content') ?>
    </div>
    <?php include(APPPATH . 'Views/components/footer.php'); ?>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>