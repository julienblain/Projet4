<?php
namespace App\Controller;

use App\Controller\PostsController;

class CommentsController extends AppController {

    public function __construct() {
        // parent gives the viewPath and loadModel()
        parent::__construct();
        $this->loadModel('Comments');
        $this->loadModel('Reported');
    }

    // to comment a post
    public function commentsComment() {

        // invisible recaptcha
        $privatekey ="	6LeeBzoUAAAAACGrDkWN57IvmfIxCZjfC2x-DdVr";
        $remoteip = $_SERVER["REMOTE_ADDR"];
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $response = $_POST["g-recaptcha-response"];

        // Curl Request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // url to retrieve
        curl_setopt($curl, CURLOPT_POST, true); // do a http post
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // return the transfert as a string of the return value of curl_exec
        curl_setopt($curl, CURLOPT_POSTFIELDS, array( // datas http post
            'secret' => $privatekey,
            'response' => $response,
            'remoteip' => $remoteip
            ));
        $curlData = curl_exec($curl);
        curl_close($curl);

        // Parse data
        $recaptcha = json_decode($curlData, true);

        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $author = htmlspecialchars($_POST['author']);
        $content = htmlspecialchars($_POST['content']);
        $email = htmlspecialchars($_POST['email']);
        $addressIp = $_SERVER['REMOTE_ADDR'];

        // so that the value remains during the treatment
        $addressIp = str_replace(".", "", $addressIp);

        // if js disabled
        if(($content == "") || ($email == "")) {
            echo "<p class='notification'>Vous n'avez pas renseigné d'email ou de contenu. <br>
            Votre commentaire ne peut etre pris en compte. </p>";
        } else {
            if ($recaptcha["success"]) {
                // control users reported
                $controlIpReported = $this->Reported->countIpReported($addressIp);

                if(($controlIpReported[0]) > 3) {
                    include_once($this->viewPath.'posts/reported.php');
                } else {
                    $this->Comments->insert($postId, $author, $email, $content, $addressIp);
                    include_once($this->viewPath."posts/addComment.php");
                }
            }
            else {
                echo '<p class="notification">Oups, une erreur s\'est produite nous n\'avons pas pu enregistrer votre commentaire. </p>';
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

        // so that the value remains during the treatment
        $addressIp = str_replace(".", "", $addressIp);

        // control users reported
        $controlIpReported = $this->Reported->countIpReported($addressIp);

        if($controlIpReported[0] > 3) {
            include_once($this->viewPath.'posts/reported.php');
        }
        else {
            $nbReported = $this->Comments->queryReported($commentId);

            // if comment doesn't exist
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
            include_once($this->viewPath."posts/reporting.php");
        }

        $index = new PostsController;
        return $index->index();
    }
}
