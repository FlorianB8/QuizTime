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
?>