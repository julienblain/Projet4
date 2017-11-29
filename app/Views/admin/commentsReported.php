<section id="admin-comments-reported">
    <h2>Commentaires signalés : </h2>
    <ul>
       
        <?php
        foreach($commentsReported as $comment): ?>
            <li class="comments-backWhite">
               
                 
                 <p class="bowlby nb-reported">Nombre de signalement : <?= $comment->reportedComment?></p>
                 <p class="megrim numChap">Chapitre <?= $comment->idPost ?></p>
                 <p class="bowlby email-reported"><?= $comment->mail?></p>
               
               
                <p class="comment-author"><?= $comment->author?></p>
                 <p class="comment-date"><?= $comment->dateComment?></p>
               
               
               
                <p class="comment-content"><?= $comment->contentComment?></p>
                
                 
              
                <a class=" btn-bowlby" href="?p=comments.<?= $comment->idComment ?>.ignore">Ignorer</a>
           
        
                <a  class="btn-bowlby" href="?p=comments.<?= $comment->idComment ?>.delete.<?=
                     $comment->mail ?>.<?=
                     $comment->addressIp ?>">

                     Supprimer</a>
           



            </li>
        <?php endforeach;?>
    </ul>
</section>