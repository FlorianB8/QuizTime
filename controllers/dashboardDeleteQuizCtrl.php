<?php 
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
unset($_SESSION['pointsVerify']);


// Récupération de l'ID
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));
if($_SESSION['user']->role != 2){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}
try {
    $result = Quiz::delete($id);    
    // Test pour vérifier si la suppression à était effectué
    if($result == 0){
        Flash::setMessage(QUIZ_NOT_DELETE,'danger');
        header('location: ./dashboardQuizzesCtrl.php');
    } else {
        $pathfile = __DIR__ . '/../public/assets/uploads/imgQuiz/imgQuiz'.$id.'.jpg'; 
        unlink($pathfile);
        Flash::setMessage(QUIZ_DELETE,'success');
        header('location: ./dashboardQuizzesCtrl.php');
    }
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}