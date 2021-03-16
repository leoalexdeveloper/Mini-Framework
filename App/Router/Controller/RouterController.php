<?php

namespace App\Router\Controller;

REQUIRE_ONCE(dirname(dirname(__FILE__)) . "/Helpers/Helpers.php");

use App\Router\Classes\RouterDispatch;

class RouterController{

    private $uri;
    private $method;

    public function __construct(){
        $this->uri = (String) $this->getUri();
        $this->method = (String) $this->getMethod();
        $this->uri = (String) $this->getUsableUri($this->uri);
        $this->uri = (String) fixMissController($this->uri);
        $this->uri = (String) fixMissAction($this->uri);
        $this->uri = (String) fixSlashAtEnd($this->uri);
        echo $this->uri;
        try{
            RouterDispatch::start($this->uri, $this->method);
        }catch(\Exception $e){
            echo $e->getMessage();
        }

    }

    private function getUri() : String
    {
        return filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
    private function getMethod() : String
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getUsableUri($uri) : String{
        $finalPos = strlen(SITE_PATH);
        return str_replace(substr($uri, 0, $finalPos), "", $uri);
    }
}