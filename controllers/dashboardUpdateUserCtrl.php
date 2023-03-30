<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

if($_SESSION['user']->role != 2){
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

    $points = intval(filter_input(INPUT_POST, 'points', FILTER_SANITIZE_NUMBER_INT));
    if (empty($points)) {
        $points = 0;
    }

    $role = intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));
    if ($role != 1 && $role != 2) {
        $error['role'] = 'Role non défini';
    }
    if (empty($error)) {
        $userUpdate = new User();
        $userUpdate->setPseudo($pseudo);
        $userUpdate->setEmail($email);
        $userUpdate->setPassword($passwordHash);
        $userUpdate->setPoints($points);
        $userUpdate->setRole($role);
        $result = $userUpdate->update($id);
        if ($result == false) {
            Flash::setMessage(USER_NOT_UPDATE,'danger');
            header('location: ./dashboardUsersCtrl.php');
        } else {
            Flash::setMessage(USER_UPDATE,'success');
            header('location: ./dashboardUsersCtrl.php');
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
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}


include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/updateUser.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
