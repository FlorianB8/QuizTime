<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form class="row mb-5" action="" method="post">
                    <?php foreach ($questions as $question) { ?>
                        <div class="col-12 col-lg-6">
                            <div class="mx-5 my-4">
                                <p><?= $question->question ?></p>
                                <div class="text-center">
                                    <?php foreach ($answers as $answer) {
                                        if ($answer->id_questions == $question->id) {
                                    ?>
                                            <input id="answers[<?= $answer->id ?>]" name="answers[<?= $answer->id_questions ?>]" value='<?= $answer->choice ?>' type="radio">
                                            <label for="answers[<?= $answer->id ?>]"><?= $answer->answer ?></label>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <input class="btnFormSubmit mx-auto mt-5" type="submit" name="validAnswer" id="validAnswer" value="Valider">
                </form>
                <hr class="w-50 mx-auto">
                <form class="row text-center mt-5 justify-content-center" action="" method="post">
                    <div class="col-12 mt-5">
                        <h2>Commentaire</h2>
                        <hr class="mx-auto w-25">
                    </div>
                    <textarea class="col-8" name="comment" id="comment" rows="10"></textarea>
                    <div class="col-8 mt-5 textGreen">
                        <div class="row mx-auto bgDark rounded-3 mx-5">
                            <?php foreach ($comments as $comment) { ?>
                                <hr class="w-50 mx-auto">
                                <div class="col-12 my-5">
                                    <h4 class="">Auteur :   <?= $comment->pseudo ?></h4>
                                    <p class="text-center">"<?= $comment->content ?>"</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>