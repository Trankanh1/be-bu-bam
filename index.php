<?php
require 'config.php';
include MODEL_PATH.DIRECTORY_SEPARATOR.'BaseModel.php';

if (isset($_GET['p'])) {

    $controller = is_null($_GET['p']) ? 'home' : ucfirst($_GET['p']) . 'Controller';
    $action = isset($_GET['act']) ? $_GET['act'] : 'index';
    $fileName = CONTROLLER_PATH . DIRECTORY_SEPARATOR . $controller . '.php';
    $className = $controller;
    if (file_exists($fileName)) {
        require $fileName;
        if (method_exists($className, $action) && class_exists($className)) {
            $oject = new $className();
            $oject->$action();
        }
    } else {
        require '404.php';
    }
} else header('Location: '.BASE_URL.'?p=home');
