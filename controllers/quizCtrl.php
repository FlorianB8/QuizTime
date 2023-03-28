<?php
include(__DIR__ . '/../models/Connect.php');
include(__DIR__ . '/../models/Question.php');
include(__DIR__ . '/../models/Answer.php');

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $answers
// }
$questions = Question::getAllQuestions(2);
$answers = Answer::getAll();


// dd($answers,$valid);
require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/quiz.php');
require_once(__DIR__.'/../views/templates/footer.php');