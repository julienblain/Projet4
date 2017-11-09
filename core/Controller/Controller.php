<?php
namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    protected function render() {

        require($this->viewPath . 'templates/' . $this->template . '.php');

    }

    protected function forbidden() {
        //TODO faire la vaue
    }

    protected function notFound() {
        //TODO faire la vue
    }
}
