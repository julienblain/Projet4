<?php

namespace App\Controller;
use App\Controller\PostsController;


class CommentsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        //$this->loadModel('Posts');
        $this->loadModel('Comments');
        $this->loadModel('Reported');

    }

    public function commentsComment() {
        $privatekey ="	6LeeBzoUAAAAACGrDkWN57IvmfIxCZjfC2x-DdVr";
        $remoteip = $_SERVER["REMOTE_ADDR"];
        $url = "https://www.google.com/recaptcha/api/siteverify";

        // Form info
        echo'recaptcha';
        
        $response = $_POST["g-recaptcha-response"];

        // Curl Request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); //url a recuperer
        curl_setopt($curl, CURLOPT_POST, true); //pour faire un http post
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //retourne directement le transfert sous forme de chaine de valeur
        //retourné par curl_exec
        curl_setopt($curl, CURLOPT_POSTFIELDS, array( //données a passer lors d'une opé http post
            'secret' => $privatekey,
            'response' => $response,
            'remoteip' => $remoteip
            ));
        $curlData = curl_exec($curl); //execution de la session curl
        curl_close($curl);

        // Parse data
        $recaptcha = json_decode($curlData, true);
        //fin recaptcha
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $email = $_POST['email'];
        $addressIp = $_SERVER['REMOTE_ADDR'];

        if(($content == "") || ($email == "")) {
            echo "Vous n'avez pas renseigné d'email ou de contenu. Votre commentaire ne peut etre pris en compte.";
        } else {
            if ($recaptcha["success"]) {
                    $controlReported = $this->Reported->countReported($email);

                if($controlReported[0] > 0) {
                    return $this->render('posts.reported');
                }

                $this->Comments->insert($postId, $author, $email, $content, $addressIp);
            }

            else {
                //TODO gestion erreur
                echo '<p class="action-validation">Une erreur s\'est produite nous n\'avons pas pu enregistré votre commentaire. </p>';
            };

        };
        include_once($this->viewPath."posts/addComment.php");
        $index = new PostsController;
        return $index->index();
    }

    public function commentsReported() {

        //TODO faire le controle des signalant
        $id = \explode('.', $_GET['p']);
        $postId = $id[1];
        $commentId = $id[3];
        $email = $_POST['email'];

        /*controle du mail du signaleur
        $reported = $this->Reported->count($email);

        if ($reported[0] == 1 ) {
            return $this->render('posts.reported');
        } else {
         $this->Reported->addEmail($email);
*/

            $nbReported = $this->Comments->queryReported($commentId);
            $nbReported = $nbReported->reportedComment +1;
            $this->Comments->updateComment($commentId, $nbReported);

            //on inclut la vue de remercieement et on retourne à l'index
            include_once($this->viewPath."posts/reporting.php");
            $index = new PostsController;
            return $index->index();




    }
}
