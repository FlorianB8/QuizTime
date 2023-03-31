<?php 
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../helpers/dd.php');


// Récupération de l'ID
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

try {
    $result = Quiz::delete($id);    
    // Test pour vérifier si la suppression à était effectué
    if($result == 0){
        Flash::setMessage(QUIZ_NOT_DELETE,'danger');
        header('location: ./dashboardQuizzesCtrl.php');
    } else {
        Flash::setMessage(QUIZ_DELETE,'success');
        header('location: ./dashboardQuizzesCtrl.php');
    }
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}