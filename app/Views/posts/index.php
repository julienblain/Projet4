
  
  
   <div id='postAndComments-index'>
   <div id="post-index">
   <div id="post-index-container">
       <div class="postTitle">
        <p>TITRE DU BILLET : <?= $post[0]->title?></p>
        <p id="postDate">Date : Le <?php
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                        echo   $date->format('d.m.Y');
                    ?></p>

    </div>
    <div id="postContent"><?= $post[0]->content ?></div>
    </div>
</div>

<div id="post-index-btn" class="btn">
   <!-- caractere special en html-->
    <button id="book-previous" class="btn-book">&lsaquo;</button>
    <button id="book-after"  class="btn-book">&rsaquo;</button>
    
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
     <p><?= $comment->author ?></p>
     <p><?php echo $comment->contentComment; ?></p>
     <button type="button" name="button">Signaler</button>
     <form class="reported-form" action="?p=comments.<?= $post[0]->id ?>.reported.<?= $comment->idComment ?>" method="post">
         <label for="">Veuillez renseigner votre email</label>
         <input type="email" name="email" value="" required>
         <button type="submit" name="button">Valider</button>

     </form>


 <?php endforeach; ?>
</div>
</div>
