<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/mediaScreen.css">
    <link rel="shortcut icon" href="../../public/assets/imgs/logo2.png" type="image/x-icon">
    <title>QuizTime</title>
</head>

<body>
    <!-- Navbar responsive bootstrap -->
    <header>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bgDark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="../../controllers/homeCtrl.php" class="ms-4">
                            <img class="logo" src="../../public/assets/imgs/logo2.png" alt="Logo du site QuizTime">
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li>
                                <a href="../../controllers/dashboardHomeCtrl.php" class="nav-link align-middle px-0 linkPage">
                                    <i class="fa-solid fa-house"></i><span class="ms-1 d-none d-sm-inline"> Accueil</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../controllers/dashboardUsersCtrl.php" class="nav-link px-0 align-middle linkPage">
                                    <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline"> Utilisateurs</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../controllers/dashboardQuizzesCtrl.php" class="nav-link px-0 align-middle linkPage">
                                    <i class="fa-solid fa-circle-question"></i> <span class="ms-1 d-none d-sm-inline"> Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../controllers/dashboardCategoriesCtrl.php" class="nav-link px-0 align-middle linkPage ">
                                    <i class="fa-solid fa-folder-open"></i> <span class="ms-1 d-none d-sm-inline"> Catégories</span>
                                </a>
                            </li>
                            <li>
                                <a href="../../controllers/dashboardCommentsCtrl.php" class="nav-link px-0 align-middle linkPage">
                                    <i class="fa-solid fa-comments"></i> <span class="ms-1 d-none d-sm-inline"> Commentaires</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="textGreen fa-solid fa-user me-3"></i>
                                <span class="d-none d-sm-inline mx-1 textGreen">Florian</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark bgGreen text-small shadow">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="">