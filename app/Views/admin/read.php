<?php include($this->viewPath."/admin/index.php"); ?>


<button><a href="?p=posts.<?= $post[0]->id ?>.delete">Supprimer</a></button>

    <p>TITRE DU BILLET : <?= $post[0]->title?></p>
    <p>Date : Le <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                    echo   $date->format('d.m.Y');
                ?></p>


    <p><?= $post[0]->content ?></p>
</div>
<div class="comments">
    <p>Commentaire :</p>
    <?php
    foreach($comments as $comment) :
     ?>
     <p><?php echo $comment->contentComment; ?></p>
 <?php endforeach; ?>
</div>
