<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Category.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));
try {
    if(Quiz::isIdExist($id) == false) {
        throw new Exception("L'ID du quiz n'existe pas !", 1);
    }
    $quiz = Quiz::get($id);
    $quizzes = Quiz::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
    die;
}


include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/quiz.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
