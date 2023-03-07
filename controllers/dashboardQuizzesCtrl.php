<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Category.php');


try {
    $quizzes = Quiz::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}


include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/quizzes.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
