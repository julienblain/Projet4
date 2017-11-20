<?php include($this->viewPath."/admin/index.php"); ?>
<form method="post" action="?p=posts.created">
    <label for="postTitle"> Titre : </label>
    <textarea  id="post-title" name="postTitle" rows="4" cols="40">

    </textarea>
    <label for="postContent">Billet : </label>
    <textarea  id="post-content" name="postContent" rows="4" cols="40">

    </textarea>
    <button type="submit" name="btn-created">Créer</button>
</form>
