<?php

//Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors',false);
ini_set('log_errors',true);
ini_set('ignore_repeated_errors',true);

$directorio = 'logs';

if(!is_dir($directorio)){
    mkdir($directorio, 0775, true);
}

ini_set('error_log', $directorio . '/errores.log');

//iniciar sesión
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


//requerir controladores

require_once "Controllers/TemplateController.php";


$template = new TemplateController();
$template -> showTemplate();