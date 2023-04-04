<?php
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Question.php');
require_once(__DIR__ . '/../config/init.php');
// dd($_SESSION['user']);
if(!isset($_SESSION['user'])){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous devez vous connecter ou créer un compte pour accéder à cette partie du site !', 'danger');
    header('location: /connexion-inscription');
    die;
}
$message = Flash::getMessage();
$script = 'quiz';
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));
$quiz = Quiz::get($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    $points = 0;
    $nbCorrect = 0;
    $answer1 = filter_input(INPUT_POST,'answer1', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer2 = filter_input(INPUT_POST,'answer2', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer3 = filter_input(INPUT_POST,'answer3', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer4 = filter_input(INPUT_POST,'answer4', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer5 = filter_input(INPUT_POST,'answer5', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer6 = filter_input(INPUT_POST,'answer6', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer7 = filter_input(INPUT_POST,'answer7', FILTER_SANITIZE_SPECIAL_CHARS);
    $answer8 = filter_input(INPUT_POST,'answer8', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($answer1) || empty($answer2) || empty($answer3) || empty($answer4) || empty($answer5) || empty($answer6) || empty($answer7) || empty($answer8)){
        Flash::setMessage('Veuillez sélectionner toutes vos réponses', 'danger');
        header('location: ./quizCtrl.php?id='.$id);
        die;
    }
    $idQuestion1 = substr($answer1, 2);
    $correctAnswer1 = Question::verifyCorrectAnswer($idQuestion1);
    if(substr($answer1, 0, 1) == $correctAnswer1->correct){
        $points += $correctAnswer1->points;
        $nbCorrect += 1;
    }    
    $idQuestion2 = substr($answer2, 2);
    $correctAnswer2 = Question::verifyCorrectAnswer($idQuestion2);
    if(substr($answer2, 0, 1) == $correctAnswer2->correct){
        $points += $correctAnswer2->points;
        $nbCorrect += 1;
    }
    $idQuestion3 = substr($answer3, 2);
    $correctAnswer3 = Question::verifyCorrectAnswer($idQuestion3);
    if(substr($answer3, 0, 1) == $correctAnswer3->correct){
        $points += $correctAnswer3->points;
        $nbCorrect += 1;
    }
    $idQuestion4 = substr($answer4, 2);
    $correctAnswer4 = Question::verifyCorrectAnswer($idQuestion4);
    if(substr($answer4, 0, 1) == $correctAnswer4->correct){
        $points += $correctAnswer4->points;
        $nbCorrect += 1;
    }
    $idQuestion5 = substr($answer5, 2);
    $correctAnswer5 = Question::verifyCorrectAnswer($idQuestion5);
    if(substr($answer5, 0, 1) == $correctAnswer5->correct){
        $points += $correctAnswer5->points;
        $nbCorrect += 1;
    }
    $idQuestion6 = substr($answer6, 2);
    $correctAnswer6 = Question::verifyCorrectAnswer($idQuestion6);
    if(substr($answer6, 0, 1) == $correctAnswer6->correct){
        $points += $correctAnswer6->points;
        $nbCorrect += 1;
    }
    $idQuestion7 = substr($answer7, 2);

    
    $correctAnswer7 = Question::verifyCorrectAnswer($idQuestion7);
    if(substr($answer7, 0, 1) == $correctAnswer7->correct){
        $points += $correctAnswer7->points;
        $nbCorrect += 1;
    }
    $idQuestion8 = substr($answer8, 2);
    $correctAnswer8 = Question::verifyCorrectAnswer($idQuestion8);
    if(substr($answer8, 0, 1) == $correctAnswer8->correct){
        $points += $correctAnswer8->points;
        $nbCorrect += 1;

    }

    if($nbCorrect >= 0 && $nbCorrect <= 2){
        $messageResult = BAD;
    } else if($nbCorrect > 2 && $nbCorrect <= 5) {
        $messageResult = MID;
    } else {
        $messageResult = GOOD;
    }
    $_SESSION['user']->nbPointsLast = $points;
    $_SESSION['user']->lastQuiz = $quiz->quizName; 
    Flash::setMessage($messageResult."<br> Point(s) gagné(s) : $points <br> Bonne(s) réponse(s) : $nbCorrect", 'success');
    $points += $_SESSION['user']->points;
    // dd($_SESSION);
    $userAddPoints = new User;
    $userAddPoints->setPoints($points);
    $userAddPoints->updatePoints($_SESSION['user']->id);
    $_SESSION['user']->points = $points;
    header('location: ./profilCtrl.php');
    // dd($points);

}

$comments = Comment::getAll();

require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/quiz.php');
require_once(__DIR__.'/../views/templates/footer.php');