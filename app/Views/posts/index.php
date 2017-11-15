<div class="">
    <ul>Liste de chapitre
        <?php foreach($postsTitle as $postTitle): ?>
            <li class="post-title"><?= $postTitle->title ?></li>
        <?php endforeach; ?>
    </ul>
    <p>TITRE DU BILLET : <?= $postAndComments[0]->title?></p>
    <p>Date : Le <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $postAndComments[0]->datePost);
                    echo   $date->format('d.m.Y');
                ?></p>


    <p><?= $postAndComments[0]->content ?></p>
</div>
<div class="comments">
    <p>Commentaire :</p>
    <?php
    foreach($postAndComments as $comment) :
     ?>
     <p><?php echo $comment->contentComment; ?></p>
 <?php endforeach; ?>
</div>
