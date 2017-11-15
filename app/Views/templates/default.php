<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= App::getInstance()->titlePage ?></title>
    </head>
    <body>
        <div class="nav">
            <ul>Liste de chapitre
                <?php foreach($postsTitle as $postTitle): ?>
                    <li class="post-title">
                        <a href="?p=posts.<?= $postTitle->id ?>.selected">
                            <?= $postTitle->title ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?= $content ?>
    </body>
</html>
