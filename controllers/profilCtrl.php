<?php 
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Comment.php');
unset($_SESSION['pointsVerify']);

// dd($_SESSION['user']);
if(!isset($_SESSION['user'])){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous devez être connecté pour accéder à votre profil !', 'danger');
    header('location: /accueil');
    die;
}

$comments = Comment::getCommentsUser($_SESSION['user']->id);
$message = Flash::getMessage();

require_once(__DIR__ . '/../views/templates/header.php');
require(__DIR__ . '/../views/profil.php');
require_once(__DIR__ . '/../views/templates/footer.php');