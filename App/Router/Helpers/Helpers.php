<?php

function fixMissController(String $uri){
    return (empty($uri)) ? "home/home" : $uri;  
}

function fixMissAction(String $uri) : String
{
    return (preg_match("/[a-zA-Z0-9]\/[a-zA-Z0-9]/i", $uri) == false) ? (str_replace("/", "", $uri) . "/" . $uri) : $uri;
}

function fixSlashAtEnd(String $uri) : String
{
    return (substr($uri, -1) == "/") ? substr($uri, 0,  -1) : $uri;
}