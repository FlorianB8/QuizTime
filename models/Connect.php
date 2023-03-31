<?php
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/dd.php');

class Database
{
    private static object $db;

    public static function dbConnect()
    {
        if(!isset(self::$db)){
            self::$db = new PDO(DB_NAME, DB_USER, DB_PASSWORD);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 
        return  self::$db;
    }
}

