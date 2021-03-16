<?php

namespace App\Controller;

use App\Controller\Action\ExecuteAction;

class Home{
    public function __construct($route){
        ExecuteAction::execute($route);
    }

    
        

    public function home(){}
    public function login(){}
}