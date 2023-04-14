<?php
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
unset($_SESSION['pointsVerify']);


// Récupération de l'ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if ($_SESSION['user']->id != $id) {
    Flash::setMessage('<i class="me-3 fa-solid fa-ban fa-beat" style="color: #f50031;"></i>  Vous n\'avez pas accès à cette partie du site !', 'danger');
    header('location: /accueil');
    die;
}
try {
    $result = User::delete($id);
    // Test pour vérifier si la suppression à était effectué
    if ($result == 0) {
        Flash::setMessage(USER_NOT_REMOVE, 'danger');
        header('location: /accueil');
    } else {
        Flash::setMessage(USER_REMOVE, 'success');
        header('location: /accueil');
    }
    unset($_SESSION['user']);
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}
