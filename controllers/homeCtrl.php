<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');



try {
    $thirdQuizzes = Quiz::getThirdQuiz();
    $categories = Category::getFourthCategory();
    $users = User::getTop3Users();
    $message = Flash::getMessage();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}


include_once(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');
