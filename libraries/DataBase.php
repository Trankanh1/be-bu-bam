<?php
class Database {

    public static $db;
    public static $server =  SERVER_NAME;
    public static $username = USER_NAME;
    public static $password = PASSWORD;
    public static $dbname = DB_NAME;

    public function connect()
    {
        self::$db = new mysqli(self::$server, self::$username, self::$password, self::$dbname);
        mysqli_set_charset(self::$db,  'UTF8');
        if(self::$db->connect_error) {
            die('Can not connect to the database');
        }
        return self::$db;
    }
    
}