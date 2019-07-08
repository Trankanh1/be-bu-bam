
<?php
/*
*Team5 Banking Academy*
*/
date_default_timezone_set("Asia/Bangkok");
$root = dirname(__FILE__);
$host = $_SERVER['HTTP_HOST'];
//khoi tao baseURL
$baseURL = '';
define('BASE_URL', $baseURL);//lay duong dan tuyet doi

// dinh nghia duong dan tro den thu muc views, models, controllers cua website
define('ROOT',$root);
define('VIEW_PATH', $root.DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('MODEL_PATH', $root.DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR);
define('CONTROLLER_PATH', $root.DIRECTORY_SEPARATOR.'site'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR);
define('HELPER', $root.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR);

// dinh nghia duong dan tro den thu muc views, models, controllers cua admin
define('ADMIN_VIEW_PATH', $root.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('ADMIN_MODEL_PATH', $root.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR);
define('ADMIN_CONTROLLER_PATH', $root.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR);
define('ADMIN_IMAGE_PATH', $root.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
//thong tin ket noi csdl
define('SERVER_NAME','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','lap-trinh-web');
//duong dan den file ket noi co so du lieu
define('DB_PATH', $root.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR);
