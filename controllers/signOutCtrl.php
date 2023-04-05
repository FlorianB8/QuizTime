<?php 
include(__DIR__ . '/../helpers/dd.php');
session_start();
unset($_SESSION['user']);
unset($_SESSION['pointsVerify']);
session_destroy();
header('location: /connexion-inscription');
