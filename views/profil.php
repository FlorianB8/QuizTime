<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <?= $message ?>
            </div>
            <div class="col-10 bgDark text-center rounded-4 text-white">
                <h1 class="textGreen mt-5 mb-3">Informations profil</h1>
                <hr class="mx-auto w-75">
                <div class="">
                    <div class="mb-3">
                        <h3>Pseudo : </h3>
                        <p class="text-danger text-center"><?= $_SESSION['user']->pseudo ?></p>
                    </div>
                    <hr class="mx-auto w-25">
                    <div class="mb-3">
                        <h3>Email : </h3>
                        <p class="text-danger text-center"><?= $_SESSION['user']->email ?></p>
                    </div>
                    <hr class="mx-auto w-25">
                    <div class="mb-3">
                        <h3>Mot de passe :</h3>
                        <p class="text-danger text-center">**********</p>
                    </div>
                </div>
                <a class="btnLog mx-auto p-2" href="./../controllers/updateUserCtrl.php">Modifier</a>
                <h1 class="textGreen mt-5 mb-3">Statistiques quiz</h1>
                <hr class="mx-auto w-75">
                <div class=" text-center mb-3">
                    <h3>Nombre de points : </h3>
                    <p class="text-danger text-center"><?= $_SESSION['user']->points ?></p>
                </div>
                <hr class="mx-auto w-25">
                <div class=" text-center mb-3">
                    <h3>Dernier Quiz : </h3>
                    <p class="text-danger text-center"><?= $_SESSION['user']->lastQuiz ?? 'Aucun' ?></p>
                </div>
                <hr class="mx-auto w-25">
                <div class=" text-center mb-3">
                    <h3>Nombre de points gagné sur le dernier quiz : </h3>
                    <p class="text-danger text-center"><?= $_SESSION['user']->nbPointsLast ?? '0' ?></p>
                </div>
            </div>
        </div>
    </div>
</main>