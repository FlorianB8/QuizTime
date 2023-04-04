<?php 
require_once(__DIR__ . '/../../models/Question.php');
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

$questions = Question::getAllQuestions($id);

echo json_encode($questions);