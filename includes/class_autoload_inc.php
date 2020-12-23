<?php

spl_autoload_register('my_auto_loader');

function my_auto_loader($class_name)
{
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'includes') != false){
        $path = '../classes/';
    }
    else{
        $path = 'classes/';
    }
    $extension = '_class.php';
    $file_name = $path . $class_name . $extension;

    if (!file_exists($file_name)) {
        return false;
    }

    require_once $path . $class_name . $extension;
}