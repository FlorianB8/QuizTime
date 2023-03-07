<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../helpers/dd.php');



try {
    $categories = Category::getAll();
    $users = User::getTopUsers();
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
}
// $user = new User();
// $user->setPseudo('Test');
// $user->setEmail('Test@gmail.com');
// $user->setPassword('test');
// $user->setPoints(100);
// $user->setRole(1);

// $user->update(1);

// User::delete(1);
// $message = User::getAll();
// dd($message);
include_once(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');
