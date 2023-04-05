<?php 
require_once(__DIR__ . '/../../models/Question.php');

$search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
$limit = intval(filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_NUMBER_INT));
$offset = ((intval(filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_NUMBER_INT)))-1)*$limit;

$questions = Question::getBySearch($search, $limit, $offset);

echo json_encode($questions);