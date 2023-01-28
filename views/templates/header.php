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
    <title>QuizTime</title>
</head>

<body>
    <!-- Navbar responsive bootstrap -->
    <header>
        <div class="container-fluid header text-center">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container-fluid navMenu">
                    <a href="../../controllers/homeCtrl.php" class="menu">
                        <!-- <img class="logo" src="../../public/assets/imgs/logo1.png" alt=""> -->
                        <img class="logo2" src="../../public/assets/imgs/logo2.png" alt="Logo du site QuizTime">
                        <img class="logo3" src="../../public/assets/imgs/logo.png" alt="Logo du site QuizTime">
                    </a>
                    <button type="button" class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <!-- Lien vers chaque page -->
                        <div class="navbar-nav allLinkPage me-5">
                            <a href="../../controllers/categoryCtrl.php" class="mx-4 nav-link linkPage">Catégories</a>
                            <a href="../../controllers/classmentCtrl.php" class="mx-4 nav-link linkPage">Classement</a>
                            <a href="../../controllers/contactCtrl.php" class="mx-4 nav-link linkPage" tabindex="-1">Contact</a>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <a href="../../controllers/logCtrl.php" class="nav-item nav-link btnLog linkLog">Se connecter</a>
                        </div>
                        <!-------------------------->
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!---------------------------->