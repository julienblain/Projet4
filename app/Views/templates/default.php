<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= App::getInstance()->titlePage ?></title>
    </head>
    <body>
        <a href="?posts.index"> Accueil </a>
        <?php echo $content; ?>
    </body>
</html>
