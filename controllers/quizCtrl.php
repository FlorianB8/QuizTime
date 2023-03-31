<?php
require_once(__DIR__ . '/../models/Question.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Answer.php');
require_once(__DIR__ . '/../config/init.php');

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $answers
// }
$questions = Question::getAllQuestions(2);
$answers = Answer::getAll();
$comments = Comment::getAll();

// dd($answers,$valid);
require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/quiz.php');
require_once(__DIR__.'/../views/templates/footer.php');