<?php include($this->viewPath."/admin/nav.php"); ?>
<script type="text/javascript" src="http://localhost/Projet4/public/js/tinymce/tinymce.min.js"></script>

<section id="update">
       <form method="post" action="?p=posts.<?=$post[0]->id?>.updated">
            <label class="bowlby" for="postTitle">
                Titre : <input  id="post-title" name="postTitle" value="<?=
                    strip_tags($post[0]->title); ?>">

            </label>

            <br>
            <label class="bowlby" for="postContent">Contenu : </label>
            <textarea  id="post-content" name="postContent">
                <?= $post[0]->content ?>
            </textarea>
            <button id="btn-update" class="btn-bowlby" type="submit" name="btn-created">Mettre à jour</button>
    </form>
</section>
