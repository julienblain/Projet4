<?php include($this->viewPath."/admin/index.php"); ?>

<?php include($this->viewPath."admin/commentsReported.php"); ?>


<section id="posts-listing">
   <h2>Liste des chapitre : </h2>
    <ul>
        <?php foreach($postsTitle as $postTitle): ?>
           
            <li>
                <a class="post-listing-title bowlby" href="?p=posts.<?= $postTitle->id ?>.selected">
                    <p><?= $postTitle->id. '.'?></p> <?= $postTitle->title ?>
                </a>
                <a class="btn-bowlby" href="?p=posts.<?= $postTitle->id ?>.selected">Lire</a>
                <a class="btn-bowlby" href="?p=posts.<?= $postTitle->id ?>.update">Modifer</a>
                <a class="btn-bowlby" href="?p=posts.<?= $postTitle->id ?>.delete">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>