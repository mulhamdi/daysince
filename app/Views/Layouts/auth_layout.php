<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/tailwind.css') ?>">
    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="bg-gray-100">
    <main class="container mx-auto px-4">
        <?= $this->renderSection('main') ?>
    </main>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>