<?php
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../config/init.php');
$script = 'log';

$message = Flash::getMessage();

if (isset($_POST['pseudoRegister']) || isset($_POST['emailRegister']) || isset($_POST['passwordRegister'])) {
    $error = [];
    // Affichage du bon formulaire
    $hiddenRegister = "";
    $hiddenLogin = "hidden";
    // * Vérification de l'input email REGISTER
    $emailRegister = trim(filter_input(INPUT_POST, 'emailRegister', FILTER_SANITIZE_EMAIL));
    if (empty($emailRegister)) {
        $error['email'] = 'Champ obligatoire';
    } else {
        if (!filter_var($emailRegister, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Adresse mail non valide';
        }
        if (User::isMailExist($emailRegister)) {
            $error['email'] = 'Adresse mail déjà existante dans la base de données';
        }
    }
    // * -----------------------------

    // * Vérification de l'input pseudo REGISTER
    $pseudoRegister = trim(filter_input(INPUT_POST, 'pseudoRegister', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($pseudoRegister)) {
        $error['pseudo'] = 'Champ obligatoire';
    } else {
        $validatePseudoRegister = filter_var($pseudoRegister, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_PSEUDO . '/')));
        if (!$validatePseudoRegister) {
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

    if (empty($error)) {
        $user = new User();
        $user->setPseudo($pseudoRegister);
        $user->setEmail($emailRegister);
        $user->setPassword($passwordHash);
        $user->setPoints(0);
        $user->setRole(1);
        $result = $user->add();
        if ($result == false) {
            Flash::setMessage(USER_NOT_ADD, 'danger');
            header('location: ./controllers/logCtrl.php');
        } else {
            $to= $user->getEmail();
            $subject = 'Validation compte';
            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/controllers/emailValidateCtrl.php?email='.$user->getEmail();
            $mailValidate = 'Bonjour <br> Merci de valider votre compte en cliquant juste <a href="'.$link.'">ici</a>';
            mail($to, $subject, $mailValidate);
            Flash::setMessage(USER_ADD, 'success');
            header('location: /connexion-inscription');
        }
    }
} else if (isset($_POST['emailLogin']) || isset($_POST['passwordLogin'])) {
    $hiddenRegister = "hidden";
    $hiddenLogin = "";
    // * Vérification de l'input email LOGIN
    $emailLogin = trim(filter_input(INPUT_POST, 'emailLogin', FILTER_SANITIZE_EMAIL));
    if (empty($emailLogin)) {
        $error['emailLogin'] = 'Champ obligatoire';
    } else {
        if (!filter_var($emailLogin, FILTER_VALIDATE_EMAIL)) {
            $error['emailLogin'] = 'Adresse mail non valide';
        }
        if (!User::isMailExist($emailLogin)) {
            $error['emailLogin'] = 'Adresse mail inexistante dans la base de données';
        }
    }
    // * -----------------------------
    $passwordLogin = filter_input(INPUT_POST, 'passwordLogin');
    if (empty($passwordLogin)) {
        $error['passwordLogin'] = 'Champs mots de passe obligatoire';
    }
    if (empty($error)) {
        // * Vérification des inputs mot de passe LOGIN

        // * Récupération de l'utilisateur avec son email
        $userLogin = User::getByEmail($emailLogin);
        // * vérification du mot de passe entrée avec le mot de passe avec hashage
        $verifPassword = password_verify($passwordLogin, $userLogin->password);

        if (!$verifPassword) {
            Flash::setMessage('Vos identifiants ne correspondent pas', 'danger');
        } else {
            unset($userLogin->password);
            if($userLogin->validated_at === NULL) {
                Flash::setMessage('Vous n\'avez pas encore validé votre compte', 'danger');
            } else {
                Flash::setMessage("Bienvenue $userLogin->pseudo, vous êtes connecté.", 'success');
                $_SESSION['user'] = $userLogin;
                header('location: /');
                die;
            }
        }
    }
}

try {
    $message = Flash::getMessage();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}


require_once(__DIR__ . '/../views/templates/header.php');
require(__DIR__ . '/../views/log.php');
require_once(__DIR__ . '/../views/templates/footer.php');
