<?php
require_once(__DIR__ . '/../models/Question.php');
require_once(__DIR__ . '/../models/Answer.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../config/init.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));


if($_SESSION['user']->role != 2){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de la question
    $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($question)) {
        $error['question'] = 'Champ obligatoire';
    } 
    // * -----------------------------

    // * Vérification des points
    $points = intval(filter_input(INPUT_POST, 'points', FILTER_SANITIZE_NUMBER_INT));
    if (empty($points)) {
        $error['points'] = 'Champ obligatoire';
    } else {
        $validatePoints = filter_var($points, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_NUMBER . '/')));
        if (!$validatePoints) {
            $error['points'] = 'Points non valide';
        }
    }

    // * Vérification des 3 choix de réponses possibles
    $answerA = trim(filter_input(INPUT_POST, 'answer0', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($answerA)) {
        $error['answer'] = 'Champ obligatoire';
    }
    $answerB = trim(filter_input(INPUT_POST, 'answer1', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($answerB)) {
        $error['answer'] = 'Champ obligatoire';
    }
    $answerC = trim(filter_input(INPUT_POST, 'answer2', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($answerC)) {
        $error['answer'] = 'Champ obligatoire';
    }


    // * Vérification de la réponse correcte
    $correctAnswer = filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($correctAnswer)) {
        $error['correct'] = 'Champ obligatoire';
    }

    // * Vérification du quiz sélectionné
    $quiz = intval(filter_input(INPUT_POST, 'quiz', FILTER_SANITIZE_NUMBER_INT));
    if(empty($quiz)){
        $error['quiz'] = 'Quiz obligatoire';
    } else {
        $validateQuiz = filter_var($quiz, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_NUMBER . '/')));
        if (!$validateQuiz) {
            $error['quiz'] = 'Quiz non valide';
        }
    }
    if (empty($error)) {
        $questionUpdate = new Question;
        $questionUpdate->setQuestion($question);
        $questionUpdate->setCorrect($correctAnswer);
        $questionUpdate->setPoints($points);
        $questionUpdate->setId_quiz($quiz);
        $questionUpdate->add();

        $lastId = Database::dbConnect()->lastInsertId();


        $A = new Answer;
        $A->setAnswer($answerA);
        $A->setChoice('a');
        $A->setId_question($lastId);
        $A->add();

        $B = new Answer;
        $B->setAnswer($answerB);
        $B->setChoice('b');
        $B->setId_question($lastId);
        $B->add();

        $C = new Answer;
        $C->setAnswer($answerC);
        $C->setChoice('c');
        $C->setId_question($lastId);
        $C->add();
      
        Flash::setMessage(QUESION_ANSWER_ADD,'success');
        header('location: ./dashboardQuestionAnswerCtrl.php');

    }
}

try {
    $question = Question::get($id);
    $answers = Answer::getAllAnswersQuestion($id);
    $quizzes = Quiz::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
    die;
}

include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/addQuestionAnswer.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
