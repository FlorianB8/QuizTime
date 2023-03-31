<?php
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../config/init.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if ($_SESSION['user']->role != 2) {
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
    } else {
        $validateQuizName = filter_var($quizName, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validateQuizName) {
            $error['quizName'] = 'Veuillez renseigner un nom de quiz valide !';
        }
    }
    // * -----------------------------




    $category = intval(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT));
    if (empty($category)) {
        $error['category'] = 'Catégorie obligatoire';
    } else {
        $validateCategory = filter_var($category, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_NUMBER . '/')));
        if (!$validateCategory) {
            $error['category'] = 'Catégorie non valide';
        }
    }


    // * Vérification de l'image 
    if ($_FILES['imgQuiz']['error'] == 4) {
        $error['imgQuiz'] = 'Champ obligatoire';
    } else if (!isset($_FILES['imgQuiz'])) {
        $error['imgQuiz'] = 'Erreur générale';
    } else if ($_FILES['imgQuiz']['error'] > 0) {
        $error['imgQuiz'] = 'Erreur lors de l\'envoi de l\'image';
    } else if (!in_array($_FILES['imgQuiz']['type'], EXTENSIONS)) {
        $error['imgQuiz'] = 'Type de fichier non valide ! Le format requis est jpeg !';
    } else if ($_FILES['imgQuiz']['size'] > MAX_FILE_SIZE) {
        $error['imgQuiz'] = 'Fichier trop volumineux !';
    }

    if (empty($error)) {
        $quizUpdate = new Quiz();
        $quizUpdate->setName($quizName);
        $quizUpdate->setId_categories($category);
        $result = $quizUpdate->add();
        
        $lastId = Database::dbConnect()->lastInsertId();

        $extension = pathinfo($_FILES['imgQuiz']['name'], PATHINFO_EXTENSION);
        $from = $_FILES['imgQuiz']['tmp_name'];
        $to = LOCATION_IMG_QUIZ . "/imgQuiz$lastId.". $extension;
        move_uploaded_file($from, $to);

        $gd_img = imagecreatefromjpeg($to);
        $gd_scaled = imagescale($gd_img, 300, -1, IMG_BICUBIC);
        $to_scaled = LOCATION_IMG_QUIZ . "/scaledImgQuiz$lastId.". $extension;
        imagejpeg($gd_scaled, $to_scaled);

        if ($result == false) {
            Flash::setMessage(QUIZ_NOT_ADD, 'danger');
            // header('location: ./dashboardQuizzesCtrl.php');
        } else {
            Flash::setMessage(QUIZ_ADD, 'success');
            // header('location: ./dashboardQuizzesCtrl.php');
        }
    }
}

try {

    $categories = Category::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
    die;
}

include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/addQuiz.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
