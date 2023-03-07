<?php

require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../helpers/dd.php');

try {
    $categories = Category::getAll();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}

require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/category.php');
require_once(__DIR__.'/../views/templates/footer.php');