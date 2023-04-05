<?php 
require_once(__DIR__ . '/../../models/Comment.php');
require_once(__DIR__ . '/../../config/init.php');


$content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$idQuiz = intval(filter_input(INPUT_GET,'idQuiz', FILTER_SANITIZE_NUMBER_INT));

if(empty($content)) {
    $error['comment'] = 'Veuillez renseigner un commentaire';
}

if(empty($error)){
    $commentAdd = new Comment;
    $commentAdd->setContent($content);
    $commentAdd->setId_players($_SESSION['user']->id);
    $commentAdd->setId_quiz($idQuiz);
    $commentAdd->add();
}

$comments = Comment::getAll();

echo json_encode($comments);
