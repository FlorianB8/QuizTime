<?php 
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
define('QUIZ_UPDATE', 'Quiz modifié avec succés !');
define('QUIZ_NOT_UPDATE', 'Erreur lors de la modification du quiz !');
define('VALIDATE_COMMENT', 'Commentaire validé avec succés !');
define('NOT_VALIDATE_COMMENT', 'Erreur lors de la validation du commentaire !');

?>