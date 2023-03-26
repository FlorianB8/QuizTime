<?php
include(__DIR__ . '/../models/Connect.php');
include(__DIR__ . '/../models/Question.php');

$questionsAnswers = Question::getAllQuestionsAnswers(2);

dd($questionsAnswers);

require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/quiz.php');
require_once(__DIR__.'/../views/templates/footer.php');