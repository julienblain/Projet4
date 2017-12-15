<?php
namespace Core;

class Config {

    private $settings = [];
    private static $_instance; // bdd instance

    public function __construct($fileConfig) {
        $this->settings = require($fileConfig);
    }

    // call in App.php
    public static function getInstance($fileConfig) {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config($fileConfig) ;
        }
        return self::$_instance;
    }

    public function getSettings($key) {
        if(!isset($this->settings[$key])) {
            return null;
        }
        else {
            return $this->settings[$key];
        }
    }
}
