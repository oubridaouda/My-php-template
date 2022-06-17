<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXCHANGE</title>
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
</html>