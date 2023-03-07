<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../helpers/dd.php');


try {
    $comments = Comment::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/headerDashboard.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footerDashboard.php');
}


include_once(__DIR__ . '/../views/templates/headerDashboard.php');
include_once(__DIR__ . '/../views/dashboard/comments.php');
include_once(__DIR__ . '/../views/templates/footerDashboard.php');
