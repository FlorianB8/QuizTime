<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../helpers/dd.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if(User::isIdExist($id) == false) {
        throw new Exception("Ce joueur n'existe pas !", 1);   
    }
    $user = User::get($id);
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}


include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/profilUser.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
