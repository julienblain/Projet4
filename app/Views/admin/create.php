<?php include($this->viewPath."/admin/index.php"); ?>

   <section id="create">
       <form method="post" action="?p=posts.created">
            <label class="bowlby" for="postTitle"> Titre : </label>
            <textarea  id="post-title" name="postTitle">

            </textarea>
            <br>
            <label class="bowlby" for="postContent">Contenu : </label>
            <textarea  id="post-content" name="postContent">

            </textarea>
            <button id="btn-create" class="btn-bowlby" type="submit" name="btn-created">Créer</button>
    </form>
</section>