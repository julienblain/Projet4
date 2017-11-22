<?php

namespace App\Controller;


class CommentsController extends AppController {

    public function __construct() {
        parent::__construct(); //sinon redefinition de construct qui donne le viewPath
        //appel loadModel du parent
        //$this->loadModel('Posts');
        $this->loadModel('Comments');
        $this->loadModel('Reported');

    }

    public function commentsComment() {
        //QUESTION sur le curl
        //controle du capcha
        $privatekey ="	6LeeBzoUAAAAACGrDkWN57IvmfIxCZjfC2x-DdVr";
        $remoteip = $_SERVER["REMOTE_ADDR"];
        $url = "https://www.google.com/recaptcha/api/siteverify";

        // Form info

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
        var_dump($recaptcha);
        var_dump($_POST);
        if ($recaptcha["success"]) {
            echo "Success!";
        }

        else {
            //TODO gestion erreur
            echo "Failure!";
        }


        //fin recaptcha
        $postId = \explode('.', $_GET['p']);
        $postId = $postId[1];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $email = $_POST['email'];
        $addressIp = $_SERVER['REMOTE_ADDR'];
        $this->Comments->insert($postId, $author, $email, $content, $addressIp);
        $this->render('posts.addComment');
    }

    public function commentsReported() {
        $id = \explode('.', $_GET['p']);
        $postId = $id[1];
        $commentId = $id[3];
        $email = $_POST['email'];

        //controle du mail du signaleur
        $reported = $this->Reported->count($email);

        if ($reported[0] == 1 ) {
            return $this->render('posts.reported');
        } else {
         $this->Reported->addEmail($email);

            //QUESTION peut on faire une re
            //incrementation du nb de signalement du comment en bdd²
            $nbReported = $this->Comments->queryReported($commentId);
            $nbReported = $nbReported->reportedComment +1;
            $this->Comments->updateComment($commentId, $nbReported);


            return $this->render('posts.reporting');
        }

    }
}
