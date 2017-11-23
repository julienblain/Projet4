
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title><?= //QUESTION ou placer tinymce ?
        //TODO mettre le js en objet
        App::getInstance()->titlePage ?></title>
<script type="text/javascript" src="http://localhost/Projet4/public/Forteroche/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#post-title, #post-content'

    });
</script>
<!-- recaptach invisible -->
<script src="https://www.google.com/recaptcha/api.js"></script>
     <script>
       function onSubmit(token) {
         document.getElementById("form-comment").submit();
       }
     </script


    </head>
    <body>
        <a href="?posts.index"> Accueil </a>
        <?php echo $content; ?>




    </body>
</html>
