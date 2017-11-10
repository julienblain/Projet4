<?php
//constructeur qui lit l'array de config qu'on insere dans settings
//singleton

class Config {
    private $settings = [];
    private static $_instance; //instance de bdd

    public function __construct($fileConfig) {
        $this->settings = require($file);
    }

    public static function getInstance($fileConfig) {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config($fileConfig) ;
        }
        return self::$_instance;
    }
}


 ?>
