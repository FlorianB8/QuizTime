<?php 
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Question.php');
require_once(__DIR__ . '/../helpers/dd.php');


// Récupération de l'ID
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

try {
    $result = Question::delete($id);    
    // Test pour vérifier si la suppression à était effectué
    if($result == 0){
        Flash::setMessage(QUESTION_NOT_DELETE,'danger');
        header('location: ./dashboardQuestionAnswerCtrl.php');
    } else {
        Flash::setMessage(QUESTION_DELETE,'success');
        header('location: ./dashboardQuestionAnswerCtrl.php');
    }
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}