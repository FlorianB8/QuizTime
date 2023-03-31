<?php
require_once(__DIR__ . '/../models/Quiz.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../config/init.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));


if($_SESSION['user']->role != 2){
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i> Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    // * Vérification du nom de catégorie
    $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($category)) {
        $error['category'] = 'Champ obligatoire';
    } else {
        $validatecategory = filter_var($category, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validatecategory) {
            $error['category'] = 'Veuillez renseigner un nom de catégorie valide !';
        }
    }
    // * -----------------------------

    // * Vérification de l'icon 
    $icon = trim(filter_input(INPUT_POST, 'icon', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($icon)) {
        $error['icon'] = 'Champ obligatoire';
    } else {
        $validateIcon = filter_var($icon, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validateIcon) {
            $error['icon'] = 'Icône non valide';
        }
    }


    if (empty($error)) {
        $categoryUpdate = new Category();
        $categoryUpdate->setName($category);
        $categoryUpdate->setIcon($icon);
        $result = $categoryUpdate->add();
        if($result == false){
            Flash::setMessage(CATEGORY_NOT_ADD,'danger');
            header('location: ./dashboardCategoriesCtrl.php');
        } else {
            Flash::setMessage(CATEGORY_ADD,'success');
            header('location: ./dashboardCategoriesCtrl.php');
        }

    }
}

try {

} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
    die;
}

include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/addCategory.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
