<?php include($this->viewPath."/admin/nav.php"); ?>


<section id="update">
       <form method="post" action="?p=posts.<?=$post[0]->id?>.updated">
            <label class="bowlby" for="postTitle"> Titre : </label>
            <textarea  id="post-title" name="postTitle">
                <?= $post[0]->title ?>
            </textarea>
            <br>
            <label class="bowlby" for="postContent">Contenu : </label>
            <textarea  id="post-content" name="postContent">
                <?= $post[0]->content ?>
            </textarea>
            <button id="btn-update" class="btn-bowlby" type="submit" name="btn-created">Mettre à jour</button>
    </form>
</section>


