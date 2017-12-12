<?php include($this->viewPath."/admin/nav.php"); ?>
<script type="text/javascript" src="http://localhost/Projet4/public/js/tinymce/tinymce.min.js"></script>
   <section id="create">
       <form method="post" action="?p=posts.created">
            <label class="bowlby" for="postTitle">
                Titre : <input id="post-title" name="postTitle">
            </label>
            <br>
            <label class="bowlby" for="postContent">
                Contenu : <textarea  id="post-content" name="postContent"></textarea>
            </label>
            <button id="btn-create" class="btn-bowlby" type="submit" name="btn-created">Créer</button>
    </form>
</section>
