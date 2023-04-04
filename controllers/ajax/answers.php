<?php 
require_once(__DIR__ . '/../../models/Answer.php');


$answers = Answer::getAll();

echo json_encode($answers);