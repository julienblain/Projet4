<?php
namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    protected function render($variables = []) {

        ob_start();
        //$truc = extract($variables); //importe les variables dans la table des symboles, et envoie a la vue car le require est au meme niveau
        require($this->viewPath . 'posts/index.php');
        $content = ob_get_clean();
        //require($this->viewPath . 'templates/' . $this->template . '.php');
        //TODO a mettre ce qu'il y a dessus
        require($this->viewPath .'templates/default.php');

    }

    protected function forbidden() {
        //TODO faire la vaue
    }

    protected function notFound() {
        //TODO faire la vue
    }
}
