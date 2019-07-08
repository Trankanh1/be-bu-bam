<?php
require 'config.php';
include ADMIN_MODEL_PATH.DIRECTORY_SEPARATOR.'BaseModel.php';
session_start();
if (isset($_SESSION['user'])) {
    if (isset($_GET['p'])) {
        $controller = is_null($_GET['p']) ? 'home' : ucfirst($_GET['p']) . 'Controller';
        $action = isset($_GET['act']) ? $_GET['act'] : 'index';
        $fileName = ADMIN_CONTROLLER_PATH . DIRECTORY_SEPARATOR . $controller . '.php';
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
    }
} else{

        $p = isset($_GET['p'])? $_GET['p']:'';
        $act =  isset($_GET['act'])? $_GET['act']:'';
        $controller = 'UserController';
        $action = 'login';
        if($act == 'register' && $p == 'user') {
            $action = 'register';
        }
        $fileName = ADMIN_CONTROLLER_PATH . DIRECTORY_SEPARATOR . $controller . '.php';
        $className = $controller;

        if (file_exists($fileName)) {
            require $fileName;
            if (method_exists($className, $action) && class_exists($className)) {
            
                $oject = new $className();
                $oject->$action();
            }
        }

}
