<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Flash.php');

$email = trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

$validateEmail = User::validateEmail($email);

if ($validateEmail) {
    // * Récupération de l'utilisateur avec son email
    $user = User::getByEmail($email);

    Flash::setMessage("Bienvenue $user->pseudo, la validation de votre compte a été effectuée.", 'success');
    $_SESSION['user'] = $user;
} else {
    Flash::setMessage('Problème lors de la validation de votre compte !', 'danger');  
}
header('location: /');
die;