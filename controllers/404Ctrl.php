<?php

require_once(__DIR__ . '/../config/init.php');
unset($_SESSION['pointsVerify']);


require_once(__DIR__.'/../views/templates/header.php');
require(__DIR__.'/../views/404.php');
require_once(__DIR__.'/../views/templates/footer.php');