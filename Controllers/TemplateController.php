<?php

class TemplateController{

    public function showTemplate(){
        include "views/template.php";
    }

    public static function path(){
        if(!empty($_SERVER["HTTPS"]) &&  ("on" == $_SERVER["HTTPS"])){
            return "https://" . $_SERVER["SERVER_NAME"] . "/";
        }else{
            return "http://" . $_SERVER["SERVER_NAME"] . "/";
        }
        
    }

}