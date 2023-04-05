<?php 
// REGEX 
define('REGEXP_PSEUDO', '^[a-zA-ZÀ-ÿ0-9\' -]{2,64}$');
define('REGEXP_TEXT', '^[a-zA-ZÀ-ÿ\' -]{2,64}$');
define('REGEXP_NUMBER','^[0-9]{1,64}$');
define('REGEXP_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$');

// Constante pour lié la base de données
define('DB_NAME', 'mysql:dbname=quiztime;host=127.0.0.1');
define('DB_USER', 'admin_quiztime');
define('DB_PASSWORD', '!YZiyGSrgvgYkDwI');
// --------------------------------------

// Flash Message 
define('USER_UPDATE', 'Utilisateur modifié avec succés !');
define('USER_NOT_UPDATE', 'Erreur lors de la modification de l\'utilisateur !');
define('USER_ADD', 'Création de votre compte réalisé avec succés !');
define('USER_NOT_ADD', 'Erreur lors de la création de votre compte !');
define('CATEGORY_UPDATE', 'Catégorie modifié avec succés !');
define('CATEGORY_NOT_UPDATE', 'Erreur lors de la modification de la catégorie !');
define('CATEGORY_ADD', 'Catégorie ajoutée avec succés !');
define('CATEGORY_NOT_ADD', 'Erreur lors de la création de la catégorie !');
define('QUIZ_UPDATE', 'Quiz modifié avec succés !');
define('QUIZ_NOT_UPDATE', 'Erreur lors de la modification du quiz !');
define('QUIZ_ADD', 'Quiz ajouté avec succés !');
define('QUIZ_NOT_ADD', 'Erreur lors de la création du quiz !');
define('VALIDATE_COMMENT', 'Commentaire validé avec succés !');
define('NOT_VALIDATE_COMMENT', 'Erreur lors de la validation du commentaire !');
define('QUESION_ANSWER_UPDATE','La modification de la question et des réponses à été effectué !');
define('QUESION_ANSWER_ADD','La création de la question et des réponses à été effectué !');
define('CATEGORY_DELETE','La suppression de la catégorie été effectué !');
define('CATEGORY_NOT_DELETE','La suppression de la catégorie n\'a pas abouti !');
define('QUIZ_DELETE','La suppression du quiz été effectué !');
define('QUIZ_NOT_DELETE','La suppression du quiz n\'a pas abouti !');
define('QUESTION_DELETE','La suppression de la question et de ses réponses à été effectué !');
define('QUESTION_NOT_DELETE','La suppression de la question et de ses réponses n\'a pas abouti !');
define('USER_DELETE','La suppression de l\'utilisateur et de ses commentaires à été effectué !');
define('USER_NOT_DELETE','La suppression de l\'utilisateur et de ses commentaires n\'a pas abouti !');
define('COMMENT_DELETE','La suppression du commentaire à été effectué !');
define('COMMENT_NOT_DELETE','La suppression du commentaire n\'a pas abouti !');
define('USER_REMOVE','La suppression de votre compte et de vos commentaires à été effectué !');
define('USER_NOT_REMOVE','La suppression de votre compte et de vos commentaires n\'a pas abouti !');


// Envoi d'image
define('MAX_FILE_SIZE', 5*1024*1024);
define('EXTENSIONS', ['image/jpeg']);
define('LOCATION_IMG_QUIZ', $_SERVER['DOCUMENT_ROOT'].'/public/assets/uploads/imgQuiz');

// Différents messages selon nombre de réponses correct
define('BAD', 'Pas terrible... On dirait que tu n\'es pas très fan de ce quiz...');
define('MID', 'Pas mal mais tu peux faire mieux !');
define('GOOD', 'Bravo ! Tu es très beau et musclé grand fou !');


?>