<?php

namespace App\View;

class Render{

    public static function normalRender(Array $structure, $data=[]) : void
    {
        extract($data);

        REQUIRE_ONCE(APP_PATH . "View/Templates/" . $route . "Head.php");

        foreach($structure as $part):
            print $part;
        endforeach;

        REQUIRE_ONCE(APP_PATH . "View/Templates/" . $route . "Footer.php");
    }

    public static function ajaxRender(String $structure) : void
    {
        echo json_encode($structure, 1);
    }
}