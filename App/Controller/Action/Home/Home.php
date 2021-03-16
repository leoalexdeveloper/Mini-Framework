<?php

namespace App\Controller\Action\Home;

use App\View\Render;

class Home{
    public function __construct(Array $route)
    {
         
        $data = [
            'method' => implode("", array_keys($route)),
            'route' => implode("", array_values($route))
        ];
        
        $structure = ["<h1>Aqui</h1>"];
        
        Render::normalRender($structure, $data);
    }
}