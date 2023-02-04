<?php 
define('REGEXP_PSEUDO', '^[a-zA-ZÀ-ÿ0-9\' -]{2,64}$');
define('REGEXP_PASSWORD', '^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$');
?>