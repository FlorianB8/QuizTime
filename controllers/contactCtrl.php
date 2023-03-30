<?php
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/Flash.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de l'input pseudo CONTACT
    $pseudo = trim(filter_input(INPUT_POST, 'pseudoContact', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($pseudo)) {
        $error['pseudo'] = 'Champ obligatoire';
    } else {
        $validatePseudo = filter_var($pseudo, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_PSEUDO . '/')));
        if (!$validatePseudo) {
            $error['pseudo'] = 'Pseudo non valide';
        }
    }
    // * -----------------------------

    // * Vérification du textarea CONTACT
    $message = trim((string) filter_input(INPUT_POST, 'messageContact', FILTER_SANITIZE_SPECIAL_CHARS));
    // * --------------------------- 

    // * Vérification de l'input email CONTACT
    $email = trim(filter_input(INPUT_POST, 'emailContact', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Champ obligatoire';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Adresse mail non valide';
        }
    }
    // * -----------------------------

    if(empty($error)){
        $subject = "Message de $pseudo";
        $mailAdmin = 'contact@quiztime.fr';
        $message .= "<br> Adresse mail du contact : $email";
        mail($mailAdmin, $subject, $message);
        Flash::setMessage('Votre message à bien été envoyé', 'success');
        header('location: /');
    }
}



require_once(__DIR__ . '/../views/templates/header.php');
require(__DIR__ . '/../views/contact.php');
require_once(__DIR__ . '/../views/templates/footer.php');
