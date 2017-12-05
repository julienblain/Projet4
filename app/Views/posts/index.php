
   <section id='postAndComments-index'>
   <div id="book">
    </div>
    <div id="book-box">

   </div>

   <article id="post-index-container">
       <div class="postTitle">
        <?= $post[0]->title?>
        Le <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                        echo   $date->format('d.m.Y');
                    ?>

    </div>
    <div id="postContent"><p id="firstChild-bug-js"></p><!-- pour éviter les bug js sur le slide--><?= $post[0]->content ?><p id="endChap">Fin du Chapitre.</p><!-- pour éviter les bug js sur le slide --></div>

  </article>



<div id="post-index-btn" class="btn">
   <!-- caractere special en html fleche-->
    <button id="book-previous" class="btn-book">&lsaquo;</button>
    <button id="book-after"  class="btn-book">&rsaquo;</button>



    <aside class="comments">
       <div id="comments-btn">
            <button type="button" name="button" id="btn-comment">Commenter</button>
            <button id="btn-readComment" type="button" name="btn-readComment">Lire les commentaires</button>
        </div>
        
        <form id ="form-comment" action="?p=comments.<?= $post[0]->id ?>.comment" method="post">
           <div id="form-comment-flex">
                <label for="author"> <p>Auteur :</p>
                    <input type="text" name="author" value=" " >
                </label>
                <label for="email"> <p>Email :</p>
                    <input id='form-comment-email'type="email" name="email" placeholder="Requis" required>
                </label>
                <label for="content"><p>Votre message :</p>
                    <textarea id="form-comment-textarea" name="content" maxlength="500" placeholder="Requis" required></textarea>
                </label>
                
                <input type="hidden" name="gRecaptchaResponse" id="gRecaptchaResponse" value=""/>
                
                <div id="form-group">
                    <div id='recaptcha' class='g-recaptcha' data-sitekey="6LeeBzoUAAAAADGjPXOwCYobXVY6iUNjf3inFMQi" data-callback="SubmitRegistration" data-size="invisible"
                    ></div>
                    
                    <button type='submit' id='btn-form-submit'> Valider</button>
                </div>
             
            </div>
        </form>
<!--TODO changer la semantique html-->
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
                     <button class="comment-btn-reported" type="button" name="button">Signaler</button>

                     <form class="reported-form" action="?p=comments.<?= $post[0]->id ?>.reported.<?= $comment->idComment ?>" method="post">
                         <label for=""><p>Veuillez renseigner votre email :  </p>
                             <input type="email" name="email" value="" required>
                        </label>
                         <button class="btn-reported-submit" type="submit" name="button">Valider</button>

                 </form>

                 </div>


             <?php endforeach; ?>
        </div>
     </div>
    </aside>
</div>

</section>
