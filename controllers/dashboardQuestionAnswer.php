<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Question.php');
require_once(__DIR__ . '/../models/Answer.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');

try {
    $message = Flash::getMessage();
    $questions = Question::get();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}
include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/questionAnswer.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
