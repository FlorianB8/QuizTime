<?php
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Quiz.php');
unset($_SESSION['pointsVerify']);

$users = User::getUsersClassment();
$quizzes = Quiz::getThirdQuiz();

include_once(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/classment.php');
include_once(__DIR__.'/../views/templates/footer.php');