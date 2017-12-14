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
        $author = htmlspecialchars($_POST['author']);
        $content = htmlspecialchars($_POST['content']);
        $email = htmlspecialchars($_POST['email']);
        $addressIp = $_SERVER['REMOTE_ADDR'];
        //pour qu'addressIp reste total lors du traitement
        $addressIp = str_replace(".", "", $addressIp);

        /*cas bug recaptcha bug ou js désactivé*/
        if(($content == "") || ($email == "")) {
            echo "<p class='notification'>Vous n'avez pas renseigné d'email ou de contenu. <br>
            Votre commentaire ne peut etre pris en compte. </p>";
        } else {
            if ($recaptcha["success"]) {
                // l'utilisateur est il dans la bdd des reported
                    $controlIpReported = $this->Reported->countIpReported($addressIp);
                if(($controlIpReported[0]) > 3) {
                    include_once($this->viewPath.'posts/reported.php');
                }
                else {
                    $this->Comments->insert($postId, $author, $email, $content, $addressIp);
                    include_once($this->viewPath."posts/addComment.php");
                }


            }

            else {
                echo '<p class="notification">Oups,une erreur s\'est produite nous n\'avons pas pu enregistrer votre commentaire. </p>';
            };

        };

        $index = new PostsController;
        return $index->index();
    }

    public function commentsReported() {
        $id = \explode('.', $_GET['p']);
        $postId = $id[1];
        $commentId = $id[3];
        $addressIp = $_SERVER['REMOTE_ADDR'];
        //pour qu'addressIp reste total lors du traitement
        $addressIp = str_replace(".", "", $addressIp);

        $controlIpReported = $this->Reported->countIpReported($addressIp);
        if($controlIpReported[0] > 3) {
            include_once($this->viewPath.'posts/reported.php');
        } else {
            $nbReported = $this->Comments->queryReported($commentId);
            if(empty($nbReported)) {

                return $this->error();
            }

            if(isset($nbReported)) {
                $nbReported = $nbReported->reportedComment +1;
            }
            else {
                $nbReported = 1;
            }
            $this->Comments->updateComment($commentId, $nbReported);

            //on inclut la vue de remercieement et on retourne à l'index
            include_once($this->viewPath."posts/reporting.php");
        }

        $index = new PostsController;
        return $index->index();
    }

}
