<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 d-flex justify-content-center mt-5">
                <div class="mx-5 cardProfil bgDark textGreen">
                    <div class="">
                        <div class="text-center me-5">
                            <h1>Profil</h1>
                            <hr>
                        </div>
                        <ul class="profilInfo">
                            <?php if($user->role == 1) {
                                $userRole = 'Joueur';
                             }else {
                                $userRole = 'Admin';
                             } ?>
                            <li>Pseudo : <span class="ms-2"><?= $user->pseudo ?></span> </li>
                            <li>Points : <span class="ms-2"><?= $user->points ?></span> </li>
                            <li>Rôle : <span class="ms-2"><?=$userRole ?></span> </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <a href="/controllers/dashboardUpdateUserCtrl.php?id=<?=$user->id?>" class=" text-center btnLog bgGreen mt-4">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>