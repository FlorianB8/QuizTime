<?php 
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/dd.php');

function dbConnect() {
    $db = new PDO(DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $db;
}
