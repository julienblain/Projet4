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
    <button type="button" name="button">Commenter</button>
    <form id ="form-comment" action="?p=comments.<?= $post[0]->id ?>.comment" method="post">
        <label for=""> Auteur : </label>
        <input type="text" name="author" value="">
        <label for=""> Email : </label>
        <input type="email" name="email" value="" required>
        <textarea name="content" rows="8" cols="80"></textarea>
        <button class="g-recaptcha" data-sitekey="6LeeBzoUAAAAADGjPXOwCYobXVY6iUNjf3inFMQi" data-callback="onSubmit">Valider</button>
    </form>
    <p>Commentaire :</p>
    <?php

    foreach($comments as $comment) :
     ?>
     <p><?= $comment->dateComment ?></p>
     <p><?php echo $comment->contentComment; ?></p>
     <button type="button" name="button">Signaler</button>
     <form class="" action="?p=comments.<?= $post[0]->id ?>.reported.<?= $comment->idComment ?>" method="post">
         <label for="">Veuillez renseigner votre email</label>
         <input type="email" name="email" value="" required>
         <button type="submit" name="button">Valider</button>

     </form>


 <?php endforeach; ?>
</div>
