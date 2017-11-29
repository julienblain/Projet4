


   <div id='postAndComments-index'>
   <div id="book">
    </div>
    <div id="book-box">

   </div>

   <div id="post-index-container">
       <div class="postTitle">
        <?= $post[0]->title?>
        Le <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                        echo   $date->format('d.m.Y');
                    ?>

    </div>
    <div id="postContent"><?= $post[0]->content ?><p id="endChap">Fin du Chapitre.</p></div>

  </div>



<div id="post-index-btn" class="btn">
   <!-- caractere special en html-->
    <button id="book-previous" class="btn-book">&lsaquo;</button>
    <button id="book-after"  class="btn-book">&rsaquo;</button>



    <div class="comments">
       <div id="comments-btn">
            <button type="button" name="button" id="btn-comment">Commenter</button>
            <button id="btn-readComment" type="button" name="btn-readComment">Lire les commentaires</button>
        </div>
        <!--QUESTION required ne fonctionne pas -->
        <form id ="form-comment" action="?p=comments.<?= $post[0]->id ?>.comment" method="post">
           <div id="form-comment-flex">
                <label for="author"> Auteur : 
                    <input type="text" name="author" value=" " >
                </label>
                <label for="email"> Email : 
                    <input type="email" name="email" value=" " required>
                </label>
                <label for="content">Votre message : 
                    <textarea id="form-comment-textarea" name="content" required></textarea>
                </label>
                <button id="btn-form-submit" class="g-recaptcha" data-sitekey="6LeeBzoUAAAAADGjPXOwCYobXVY6iUNjf3inFMQi" data-callback="onSubmit">Valider</button>
            </div>
        </form>
        
        <div id="comments-container">
           <div id="comments-container-flex">
                <h3>Commentaires :</h3>
                <?php
                foreach($comments as $comment) :
                 ?>
                 <div class="comments-backWhite">
                   <p class="comment-author"><?= $comment->author ?></p>
                    <p class="comment-date">
                     Le <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $comment->dateComment);
                        echo   $date->format('d.m.Y'). ' à ' .$date->format('H').'h '.$date->format('i').'min '.$date->format('s').'s';
                    ?>
                    
                    
                    </p>
                     
                     <p class="comment-content"><?php echo $comment->contentComment; ?></p>
                     <button id="btn-reported" class="comment-btn-reported" type="button" name="button">Signaler</button> 
                     
                     <form id="reported-form" action="?p=comments.<?= $post[0]->id ?>.reported.<?= $comment->idComment ?>" method="post">
                         <label for="">Veuillez renseigner votre email : 
                             <input type="email" name="email" value="" required>
                        </label>
                         <button id="btn-reported" type="submit" name="button">Valider</button>

                 </form>

                 </div>
                 
            
             <?php endforeach; ?>
        </div>
     </div>
    </div>
</div>

</div>
