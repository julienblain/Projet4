<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Découvrer le nouveau roman de Jean Forteroche, 'Billet simple pour l'Alaska'.">
	    <meta name="keywords" content="Forteroche, roman, Alaska">
	    <!--a verifier <meta name="robots" content="index"> -->

        <title><?= //QUESTION ou placer tinymce ?
        //TODO mettre le js en objet
        //TODO gerer le style de tinymce
            App::getInstance()->titlePage ?>
        </title>
        
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="http://localhost/Projet4/public/css/style.css"/>

        <script type="text/javascript" src="http://localhost/Projet4/public/Forteroche/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    /*suppression du h1*/
    tinymce.init({
        selector: '#post-title, #post-content',
        block_formats: 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6; Preformatted=pre'
        

    });
</script>
        <!-- recaptach invisible -->
        <script src="https://www.google.com/recaptcha/api.js"></script>
     <script>
       function onSubmit(token) {
         document.getElementById("form-comment").submit();
       }
        </script>

    </head>
    <body>

        <div id="main">

            <header>
            <h1 class=""><a href="?posts.index"> Jean Forteroche </a></h1>
            <p id="titleBook">Billet simple pour l'Alaska</p>
            <!--TODO changer le nom du fichier  -->

     <?php  include($this->viewPath . "/templates/nav.php");?>

            </header>
           
            <?php echo $content; ?>
            
            
            <footer>
                <a href="http://localhost/Projet4/public/Forteroche/index.php">Espace Admin</a>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <!-- jQuerry -->

        	<script type="text/javascript" src="http://localhost/Projet4/public/js/sliderBook.js"></script>
        	<script type="text/javascript" src="http://localhost/Projet4/public/js/events.js"></script>
    </body>
</html>
