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
        <div class="container-fluid header text-center">
            <div class="row">
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="container-fluid navMenu">
                        <a href="/accueil" class="menu">
                            <img class="logo2" src="../../public/assets/imgs/logo2.png" alt="Logo du site QuizTime">
                        </a>
                        <button type="button" class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarCollapse">
                            <!-- Lien vers chaque page -->
                            <div class="d-flex justify-content-between headerLink">
                                <div class="mx-lg-0 me-lg-0 d-flex flex-wrap justify-content-center fadeIn">
                                    <a href="/accueil" class="mx-4 nav-link linkPage">Accueil</a>
                                    <a href="/categories" class="mx-4 nav-link linkPage">Catégories</a>
                                    <a href="/classement" class="mx-4 nav-link linkPage">Classement</a>
                                    <a href="/contactez-nous" class="mx-4 nav-link linkPage" tabindex="-1">Contact</a>
                                </div>
                                <div class="mx-lg-0 me-lg-5 d-flex flex-wrap justify-content-around mb-3 mb-lg-0 mt-3 mt-lg-0 fadeIn">
                                    <?php if (!isset($_SESSION['user'])) { ?>
                                        <a href="/connexion-inscription" class=" nav-link btnLog linkLog mb-3 mb-lg-0">Connexion</a>
                                    <?php  } else { ?>
                                        <?php if ($_SESSION['user']->role == 2) { ?>
                                            <a href="../../controllers/dashboardHomeCtrl.php" class=" nav-link btnLog linkLog mb-3 mb-lg-0"><i class="fa-solid fa-hammer"></i></a>
                                        <?php } ?>
                                        <a href="/compte" class=" nav-link btnLog linkLog mb-3 mb-lg-0"><i class="fa-solid fa-user"></i></a>
                                        <a href="deconnexion" class=" nav-link btnLog linkLog mb-3 mb-lg-0"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-------------------------->
                        </div>
                    </div>
                </nav>

            </div>
        </div>
        <div class="rotate wave">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" preserveAspectRatio="none" viewBox="0 0 1440 560">
                <g mask="url(&quot;#SvgjsMask1062&quot;)" fill="none">
                    <path d="M 0,442 C 144,409.4 432,288.6 720,279 C 1008,269.4 1296,371 1440,394L1440 560L0 560z" fill="rgba(32, 32, 32, 1)"></path>
                </g>
            </svg>
        </div>
    </header>
    <!---------------------------->