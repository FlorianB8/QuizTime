<?php
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../config/init.php');
unset($_SESSION['pointsVerify']);

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

if($_SESSION['user']->role != 2){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de l'input Quizname 
    $quizName = trim(filter_input(INPUT_POST, 'quizName', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($quizName)) {
        $error['quizName'] = 'Champ obligatoire';
    }
    // * -----------------------------

 
  
    // * Vérification de l'input category
    $category = intval(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT));
    if(empty($category)){
        $error['category'] = 'Catégorie obligatoire';
    } else {
        $validateCategory = filter_var($category, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_NUMBER . '/')));
        if (!$validateCategory) {
            $error['category'] = 'Catégorie non valide';
        }
    }

    if (empty($error)) {
        $quizUpdate = new Quiz();
        $quizUpdate->setName($quizName);
        $quizUpdate->setId_categories($category);
        $quizUpdate->setUpdated_at(date('Y-m-d H:i:s'));
        $result = $quizUpdate->update($id);
        if($result == false){
            Flash::setMessage(QUIZ_NOT_UPDATE,'danger');
            header('location: ./dashboardQuizzesCtrl.php');
        } else {
            Flash::setMessage(QUIZ_UPDATE,'success');
            header('location: ./dashboardQuizzesCtrl.php');
        }

    }
}

try {
    if(Quiz::isIdExist($id) == false) {
        throw new Exception("L'ID du quiz n'existe pas !", 1);
    }
    $quiz = Quiz::get($id);
    $categories = Category::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
    die;
}

include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/updateQuiz.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
