<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Découvrer le nouveau roman de Jean Forteroche, 'Billet simple pour l'Alaska'.">
	    <meta name="keywords" content="Forteroche, roman, Alaska">
	    <!--a verifier <meta name="robots" content="index"> -->

        <title><?= //TODO ou placer tinymce ?
        
            App::getInstance()->titlePage ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet"> <!-- text font-family  -->
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> <!-- title, admin font-family-->

        <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"><!-- menu font-family-->

        <link rel="stylesheet" type="text/css" href="http://localhost/Projet4/public/css/style.css"/>

       
        <!--QUESTION on met les scripts dans les vu ou dans le default-->
         <script type="text/javascript" src="http://localhost/Projet4/public/js/tinymce/tinymce.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    

    </head>
    <body>

        <div id="main">

            <header>
            <h1 class=""><a href="http://localhost/Projet4/public/index.php?posts.index"> Jean Forteroche </a></h1>
            <p id="titleBook">Billet simple pour l'Alaska</p>
            <!--TODO changer le nom du fichier  -->

     <?php  include($this->viewPath . "/templates/nav.php");?>

            </header>
           <div id="content">
            <?php echo $content; ?>
            </div>

            <footer>
                <a href="http://localhost/Projet4/public/Forteroche/index.php">Espace Admin</a>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <!-- jQuerry -->
        	<script type="text/javascript" src="http://localhost/Projet4/public/js/sliderBook.js"></script>
        	<script type="text/javascript" src="http://localhost/Projet4/public/js/functions.js">
        
        </script>
        <script></script>	
    </body>
</html>
