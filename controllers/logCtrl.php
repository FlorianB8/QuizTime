<?php
include(__DIR__ . '/../config/constants.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de l'input email REGISTER
    $email = trim(filter_input(INPUT_POST, 'emailRegister', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Champ obligatoire';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Adresse mail non valide';
        }
    }
    // * -----------------------------

    // * Vérification de l'input pseudo REGISTER
    $pseudo = trim(filter_input(INPUT_POST, 'pseudoRegister', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($pseudo)) {
        $error['pseudo'] = 'Champ obligatoire';
    } else {
        $validatePseudo = filter_var($pseudo, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_PSEUDO . '/')));
        if (!$validatePseudo) {
            $error['pseudo'] = 'Pseudo non valide';
        }
    }
    // * -----------------------------

    // * Vérification des inputs mot de passe REGISTER
    $passwordRegister = filter_input(INPUT_POST, 'passwordRegister');
    $passwordConfirmRegister =  filter_input(INPUT_POST, 'passwordConfirmRegister');
    $validatePasswordRegister = filter_var($passwordRegister, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_PASSWORD . '/')));
    if (empty($passwordRegister) || empty($passwordConfirmRegister)) {
        $error['passwordRegister'] = 'Champs mots de passe obligatoire';
    } else {
        if ($passwordConfirmRegister != $passwordRegister) {
            $error['passwordRegister'] = 'Mots de passe non similaire';
        } else {
            if (!$validatePasswordRegister) {
                $error['passwordRegister'] = 'Mots de passe non valide';
            }
        }
        // * Encodage de mot de passe (HASH)
        $passwordHash = password_hash($passwordRegister, PASSWORD_DEFAULT);
    }
    // * -----------------------------
    // var_dump($_POST['pseudoRegister']);
    if(isset($_POST['pseudoRegister'])){
        $hiddenRegister = "";
        $hiddenLogin = "hidden";
    } else if (isset($_POST['pseudoLogin'])) {
        $hiddenRegister = "hidden";
        $hiddenLogin = "";
    }
    
}



require_once(__DIR__ . '/../views/templates/header.php');
require(__DIR__ . '/../views/log.php');
require_once(__DIR__ . '/../views/templates/footer.php');
