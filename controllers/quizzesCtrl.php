<?php
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../config/init.php');
unset($_SESSION['pointsVerify']);

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

try {
    $category = Category::get($id);
    $quizzes = Quiz::getByCategory($id);
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
};

// dd($answers,$valid);
require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/quizzes.php');
require_once(__DIR__.'/../views/templates/footer.php');