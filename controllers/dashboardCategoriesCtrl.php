<?php
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');
$script = 'tableCategories';

unset($_SESSION['pointsVerify']);


if($_SESSION['user']->role != 2){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}

try {
    $message = Flash::getMessage();
    $categories = Category::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}
include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/categories.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
