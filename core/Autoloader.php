<?php

namespace Core;

class Autoloader {

    static function register () {
        spl_autoload_register (array(__CLASS__, 'autoload')) ;
    }

    static function autoload ($class) {
        //autoload seulement les classes de notre framework -Si le namespace se trouve dans $class
        if (\strpos($class, __NAMESPACE__.'\\') === 0) {
            //QUESTION
            //echo $class;
            $class= \str_replace(__NAMESPACE__. '\\', '', $class);

            $class = \str_replace('\\', '/', $class);

            require __DIR__ .'/'. $class .'.php';
        }
    }
}
