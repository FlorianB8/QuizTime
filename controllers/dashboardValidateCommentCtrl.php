<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Flash.php');
require_once(__DIR__ . '/../helpers/dd.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validated_at = trim(filter_input(INPUT_POST, 'validated_at', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($validated_at)) {
        $month = date('m', strtotime($validated_at));
        $day = date('d', strtotime($validated_at));
        $year = date('Y', strtotime($validated_at));
        $isDateOk = checkdate($month, $day, $year);
        if (!$isDateOk && (strtotime($validated_at) < strtotime('now'))) {
            $error['validated_at'] = '  ';
        }
    }
    if (empty($error)) {
        $commentUpdate = new Comment();
        $commentUpdate->setValidated_at($validated_at);
        $result = $commentUpdate->validate($id);
        if ($result == false) {
            Flash::setMessage(NOT_VALIDATE_COMMENT,'danger');
            header('location: ./dashboardCommentsCtrl.php');
        } else {
            Flash::setMessage(VALIDATE_COMMENT,'success');
            header('location: ./dashboardCommentsCtrl.php');
        }
    }
}
try {
    if (Comment::isIdExist($id) == false) {
        throw new Exception("Ce commentaire n'existe pas !", 1);
    }
    $comment = Comment::get($id);
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}

include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/validateComment.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
