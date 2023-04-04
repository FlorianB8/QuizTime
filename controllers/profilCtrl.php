<?php 
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Flash.php');

if(!isset($_SESSION['user'])){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}

$message = Flash::getMessage();

require_once(__DIR__ . '/../views/templates/header.php');
require(__DIR__ . '/../views/profil.php');
require_once(__DIR__ . '/../views/templates/footer.php');