<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXCHANGE</title>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'bootstrap-icons' . DIRECTORY_SEPARATOR . 'bootstrap-icons.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'table' . DIRECTORY_SEPARATOR . 'main.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'sass' . DIRECTORY_SEPARATOR . 'index.css' ?>"/>
</head>
<!--        Toutes les page sont appelé dans le container via $content -->
<body>
    <div class="container">
        <div class="section-home-content">
            <?= $content ?>
        </div>
    </div>
</body>
<script src="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'main.js' ?>"></script>
</html>