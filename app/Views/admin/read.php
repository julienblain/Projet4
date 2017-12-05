<?php include_once($this->viewPath."/admin/nav.php");  ?>
 

<section id='postAndComments-index'>
    <div id="book">
    </div>
    <div id="book-box">

    </div>

    <article id="post-index-container">
           <div class="postTitle">
            
               <?= $post[0]->title?>
                Le
                <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                        echo   $date->format('d.m.Y');
                    ?>
               
        </div>
        <div id="postContent"><p id="firstChild-bug-js"></p><!-- pour éviter les bug js sur le slide-->
               <?= $post[0]->content ?><p id="endChap">Fin du Chapitre.</p><!-- pour éviter les bug js sur le slide -->
        </div>

    </article>



    <div id="post-index-btn" class="btn">
        <!-- caractere special en html-->
        <button id="book-previous" class="btn-book">&lsaquo;</button>
        <button id="book-after" class="btn-book">&rsaquo;</button>

  <aside class="comments">
       <div id="comments-btn">
            <button id="btn-readComment" type="button" name="btn-readComment">Lire les commentaires</button>
        </div>
       
        <div id="comments-container">
         
           <div id="comments-container-flex">
                <h3>Commentaires :</h3>
                <?php
                foreach($comments as $comment) :
                 ?>
                 <div class="comments-backWhite">
                  <p class="admin-nb-reported"class="bowlby nb-reported">Nombre de signalement : <?= $comment->reportedComment?></p>
                   <p class="bowlby admin-email-reported"><?= $comment->mail?></p>
                  
                   <p class="comment-author"><?= $comment->author ?></p>
                    <p class="comment-date">
                     Le <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $comment->dateComment);
                        echo   $date->format('d.m.Y'). ' à ' .$date->format('H').'h '.$date->format('i').'min '.$date->format('s').'s';
                    ?>
                    
                    
                    </p>
                    
                     
                     <p class="comment-content"><?php echo $comment->contentComment; ?></p>
                 
        
                <a  class="btn-bowlby admin-btn-delete-comment" href="?p=comments.<?= $comment->idComment ?>.delete.<?=
                     $comment->mail ?>.<?=
                     $comment->addressIp ?>">

                     Supprimer</a>
                    
                 </div>
                 
            
             <?php endforeach; ?>
        </div>
     </div>
    </aside>

        

    </div>

</section>