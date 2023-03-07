<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Category.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification de l'input email 
    $quizName = trim(filter_input(INPUT_POST, 'quizName', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($quizName)) {
        $error['quizName'] = 'Champ obligatoire';
    } else {
        $validateQuizName = filter_var($quizName, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validateQuizName) {
            $error['quizName'] = 'Veuillez renseigner un nom de quiz valide !';
        }
    }
    // * -----------------------------

 
  

    $category = intval(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT));
    if(empty($category)){
        $error['password'] = 'Champs mot de passe obligatoire';
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
            $message = 'Erreur lors de la modification de l\'utilisateur';
            $type = 'danger';
        } else {
            $message = 'Utilisateur modifié avec succés';
            $type = 'success';
        }

    }
}

try {
    if(Quiz::isIdExist($id) == false) {
        throw new Exception("L'ID du quiz n'existe pas !", 1);
    }
    $quiz = Quiz::get($id);
    $categories = Category::getAll();
    // dd($quiz->icon);
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
