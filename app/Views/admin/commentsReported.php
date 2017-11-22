<p>Commentaires Signalés : </p>
<ul>
    <?php foreach($commentsReported as $comment): ?>
        <li>
            <p>Nombre de signalement :<?= $comment->reportedComment?></p>
            <p><?= $comment->dateComment?></p>
            <p><?= $comment->author?></p>
            <p><?= $comment->mail?></p>
            <p><?= $comment->contentComment?></p>
            <button type="button" name="button">
            <a href="?p=comments.<?= $comment->idComment ?>.ignore">Ignorer</a>
        </button>
        <button type="button" name="button">
            <a href="?p=comments.<?= $comment->idComment ?>.delete.<?=
                 $comment->mail ?>.<?=
                 $comment->addressIp ?>">

                 Supprimer</a>
        </button>



        </li>
    <?php endforeach;?>
</ul>
