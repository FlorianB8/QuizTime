<main>
    <div class="container-fluid">
        <div class="row w-75 mx-auto">
            <div class="col-12 ">
                <div class="alert alert-<?= $type ?? '' ?> mt-3"><?= $message ?? '' ?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-100 w-lg-75 mx-auto">
                    <h1 class="text-center pt-3">Modification</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelPseudo" class="textGreen" for="pseudo">Pseudo :</label>
                        <input id="pseudo" name="pseudo" class="fieldForm p-2 " type="text" autocomplete="off" value="<?= $pseudo ??  $user->pseudo ?>">
                        <p id="errorPseudo" class="errorMessage"><?= $error['pseudo'] ?? '' ?></p>
                        <label id="labelEmail" class="textGreen mt-4" for="email">E-mail :</label>
                        <input id="email" name="email" class="fieldForm p-2 " type="email" autocomplete="off" value="<?= $email  ?? $user->email ?>">
                        <p id="errorEmail" class="errorMessage"><?= $error['email'] ?? '' ?></p>
                        <label id="labelPassword" class="textGreen mt-4" for="password">Mot de passe :</label>
                        <input id="password" name="password" class="fieldForm p-2 " type="password" autocomplete="off" value="">
                        <p id="errorPassword" class="errorMessage mb-3"><?= $error['password'] ?? '' ?></p>

                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3 me-5" type="submit" name="confirm" id="confirm" value="Modifier">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                Supprimer
                            </button>
                        </div>
                        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteLabel">Êtes vous sûr de vouloir supprimer votre compte ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a class="btn btn-danger" href="./../controllers/deleteUserCtrl.php?id=<?= $_SESSION['user']->id ?>>">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto mt-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>