<?php

namespace App\Controller\Action;

class executeAction{
    public static function execute($route){

        $class = "App\\Controller\\Action\\" . str_replace("/", "\\", implode("", array_values($route)));
        (new $class($route));
    }


}