<?php
namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    //QUESTION c pas trop degueulasse ?
    //QUESTION il vaut mieux isset ou === true
    protected function render($view, $variables = [], $view2 = null) {

        ob_start();
        if (!empty($variables)) {
            extract($variables); //importe les variables dans la table des symboles, et envoie a la vue car le require est au meme niveau
    //var_dump($variables);
        }

        if(isset($view2)) {
            require($this->viewPath . str_replace('.', '/', $view2) . '.php');
        }

        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
        //TODO a mettre ce qu'il y a dessus
        //require("$this->viewPath/templates/default.php");

    }

    protected function forbidden($view) {
        //TODO faire la vaue
        $this->render($view);


    }

    protected function notFound() {
        //TODO faire la vue
    }
}
