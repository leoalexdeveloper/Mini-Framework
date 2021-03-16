<?php

namespace App\Router\Classes;

class RouterDispatch{
    private static $uri;
    private static $controller;
    private static $action;
    private static $method;
    private static $hasRoute;
    private static $hasFile;
    private static $hasClass;
    private static $classPath;
    private static $hasMethod;
    private static $error = [];

    public static function start(String $uri, String $method){
        
        self::$uri = (String) $uri;
        self::$method = (String) $method;
        REQUIRE_ONCE(dirname(dirname(__FILE__)) . "/Routes.php");
        self::$uri = (Array) explode("/", $uri);
        self::$controller = (String) ucfirst(self::$uri[CONTROLLER_INDEX]);
        self::$action = (String) ucfirst(self::$uri[ACTION_INDEX]);
        self::hasFile();
        self::$classPath = "App\\Controller\\" . ucfirst(self::$controller);
        self::hasClass();
        self::hasMethod();
        self::hasError();
        self::dispatch();
    }

    private static function hasRoute(Array ...$routes)
    {
    
        foreach($routes as $route){
            if($route == [self::$method => self::$uri]):
               self::$hasRoute = true;
               break;
               return;
            endif;
        }
        if(empty(self::$hasRoute))
            return self::$error [] = "route";
    }

    private static function hasFile() : void
    {
        
        (file_exists(APP_PATH . "Controller/" . self::$controller . ".php"))
        ?
        self::$hasFile = true
        :
        self::$error [] = "file"
        ;
    }

    private static function hasClass() : void
    {
        (class_exists(self::$classPath))
        ?
        self::$hasClass = true
        :
        self::$error [] = "class"
        ;
    }

    private static function hasMethod() : void
    {
        (method_exists(self::$classPath, self::$action))
        ?
        self::$hasMethod = true
        :
        self::$error [] = "method"
        ;
    }

    private static function hasError() : void
    {
        //print_r(self::$error);
        if(!empty(self::$error)):
            throw new \Exception("Page not found");
        endif;
    }

    private static function dispatch() : void
    {
        if(isset(self::$hasRoute) && 
            isset(self::$hasFile) && 
            isset(self::$hasClass) &&
            isset(self::$hasMethod)
        )
        new self::$classPath(
            [self::$method => self::$controller . "/" . self::$action]
        );
    }
}