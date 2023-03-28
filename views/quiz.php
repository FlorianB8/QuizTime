<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form class="row" action="" method="post">
                    <?php foreach ($questions as $question) { ?>
                        <div class="col-6">
                            <div class="mx-5 my-4">
                                <p><?= $question->question ?></p>
                                <div class="text-center">
                                    <?php foreach ($answers as $answer) {
                                        if ($answer->id_questions == $question->id) {
                                    ?>
                                            <input id="answers[<?=$answer->id?>]" name="answers[<?=$answer->id_questions?>]" value='<?=$answer->choice?>' type="radio">
                                            <label for="answers[<?=$answer->id?>]"><?= $answer->answer ?></label>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <input class="btnFormSubmit mx-auto mt-5" type="submit" name="validAnswer" id="validAnswer" value="Valider">
                </form>
            </div>

        </div>
    </div>
</main>