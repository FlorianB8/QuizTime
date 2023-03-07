<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 ">
                <div class="alert alert-<?= $type ?? '' ?> mt-3"><?= $message ?? '' ?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Validation quiz</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3 " method="post">
                        <div class="mx-auto ">
                            <h1>Auteur :</h1>
                            <hr class="mx-auto">
                            <p class="text-white ms-3"><?= $comment->pseudo ?></p>
                        </div>
                        <div class="mx-auto my-4">
                            <h1>Contenu :</h1>
                            <hr class="mx-auto">
                            <p class="text-white"><?= $comment->content ?></p>
                        </div>
                        <input hidden type="datetime-local" name="validated_at" value="<?= date('Y-m-d H:i:s', strtotime('now')) ?>">
                        <?php if (empty($comment->validated_at)) { ?>
                            <div class="mx-auto mt-4">
                                <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Valider">
                                <a class="btn btn-danger" href="">Supprimer</a>
                            </div>
                        <?php } else { ?>
                            <h2 class="text-center">Commentaire déjà validé !</h2>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>