<!--TODO changer le nom du fichier  -->
<?php  include($this->viewPath . "/templates/nav.php");?>
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
