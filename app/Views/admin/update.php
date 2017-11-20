<?php include($this->viewPath."/admin/index.php"); ?>

<form method="post" action="?p=posts.<?=$post[0]->id?>.updated">
    <label for="post"> Titre : </label>
    <textarea  id="post-title" name="postTitle" rows="4" cols="40">
        <?= $post[0]->title ?>
    </textarea>
    <label for="">Billet : </label>
    <textarea  id="post-content" name="postContent" rows="4" cols="40">
        <?= $post[0]->content ?>
    </textarea>
    <button type="submit" name="btn-updated">Mettre à jour</button>
</form>
