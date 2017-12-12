<?php
namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []) {

        ob_start();
        if (!empty($variables)) {
            extract($variables); //importe les variables dans la table des symboles, et envoie a la vue car le require est au meme niveau
    //var_dump($variables);
        }
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();

        require($this->viewPath . 'templates/' . $this->template . '.php');

    }

    protected function forbidden($view) {
        echo 'forbidden';


    }

    public function notFound() {
        echo 'not found';
    }
}
