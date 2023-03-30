<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 bgDark text-center rounded-4 text-white">
                <h1 class="textGreen mt-5 mb-3">Informations profil</h1>
                <div class="d-flex flex-wrap">
                    <h3 class="mx-5">Pseudo : <?=$_SESSION['user']->pseudo?></h3>
                    <h3 class="mx-5">Email : <?=$_SESSION['user']->email?></h3>
                    <h3 class="mx-5">Mot de passe : **************</h3>
                    <a href="btnLog">Modifier</a>
                </div>
                <h1 class="textGreen mt-5 mb-3">Statistiques quiz</h1>
                <div class="d-flex flex-wrap">
                    <h3>Nombre de points : </h3>
                    <p class="text-danger"><?=$_SESSION['user']->points?></p>
                </div>
            </div>
        </div>
    </div>
</main>