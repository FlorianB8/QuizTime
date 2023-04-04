<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');

$id = $_SESSION['user']->id;

if(!isset($_SESSION['user'])){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de l'input email 
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Champ obligatoire';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Adresse mail non valide';
        }
    }
    // * -----------------------------

    // * Vérification de l'input pseudo 
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($pseudo)) {
        $error['pseudo'] = 'Champ obligatoire';
    } else {
        $validatePseudo = filter_var($pseudo, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_PSEUDO . '/')));
        if (!$validatePseudo) {
            $error['pseudo'] = 'Pseudo non valide';
        }
    }
    // * -----------------------------
    $password = filter_input(INPUT_POST, 'password');
    $validatePassword = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_PASSWORD . '/')));
    if (empty($password)) {
        $error['password'] = 'Champs mot de passe obligatoire';
    } else {
        if (!$validatePassword) {
            $error['password'] = 'Mot de passe non valide';
        }
        // * Encodage de mot de passe (HASH)
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }
    // * -----------------------------

    if (empty($error)) {
        $userUpdate = new User();
        $userUpdate->setPseudo($pseudo);
        $userUpdate->setEmail($email);
        $userUpdate->setPassword($passwordHash);
        $result = $userUpdate->updateUser($id);
        if ($result == false) {
            Flash::setMessage(USER_NOT_UPDATE,'danger');
            header('location: ./profilCtrl.php');
        } else {
            $_SESSION['user']->pseudo = $pseudo;
            $_SESSION['user']->email = $email;
            Flash::setMessage(USER_UPDATE,'success');
            header('location: ./profilCtrl.php');
        }
    }
}

try {
    if (User::isIdExist($id) == false) {
        throw new Exception("Ce joueur n'existe pas !", 1);
    }
    $user = User::get($id);
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}


include_once(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/updateUser.php');
include_once(__DIR__ . '/../views/templates/footer.php');
