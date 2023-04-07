<main>
    <div class="container-fluid">
        <div class="row justify-content-center fadeIn">
            <div class="col-10">
                <?= $message ?>
            </div>
            <div class="col-10 bgDark text-center my-3 rounded-4 text-white">
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
                <a class="btnLog mx-auto p-2" href="/modifier">Modifier</a>
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
            <?php if (!empty($comments)) { ?>
                <h2 class="mt-5 text-center">Mes commentaires : </h2>
            <?php } ?>
            <?php foreach ($comments as $comment) { ?>

                <hr class="w-75 mx-auto">
                <div class="col-12 my-5 text-center d-flex align-items-center justify-content-around w-50 bgDark text-white p-3 rounded-3">
                    <h3 class="">Publié le : <?= date('d/m/Y', strtotime($comment->validated_at)) ?></h3>
                    <p class="">"<?= $comment->content ?>"</p>
                    <p>Quiz : <br> <?= $comment->quizName ?></p>
                    <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    
                </div>
                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteLabel">Êtes vous sûr de vouloir supprimer ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a class="btn btn-danger" href="./../controllers/deleteCommentCtrl.php?id=<?= $comment->id ?>">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>