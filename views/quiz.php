<main>
    <input id="idQuiz" name="idQuiz" hidden value="<?= $id ?>">
    <div class="container-fluid">
        <?php if (isset($_SESSION['pointsVerify'])) { ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-center"><?= $quiz->quizName ?></h1>
                    <hr class="mx-auto w-25">
                    <?= $message ?>
                    <h3 class="text-center my-5"><?= $messageResult ?></h3>
                    <h3 class="text-center">Résultats du quiz :</h3>
                    <p class="text-center">Réponse(s) correcte(s) : <?= $nbCorrect ?>/8</p>
                    <p class="text-center">Points gagné(s) : <?= $_SESSION['user']->nbPointsLast ?></p>
                    <form class="row text-center justify-content-center mb-5">
                        <?php foreach ($questions as  $key => $question) { ?>
                            <div class=" questionBox col-lg-5 col-10 text-white m-5 p-3 bgDark rounded-3">
                                <p class="textGreen"><?= $question->question ?></p>
                                <hr class="mx-auto w-25">
                                <?php foreach ($answers as $answer) {
                                    if ($question->id == $answer->id_questions) { ?>
                                        <div>
                                            <label class="rad-label">
                                                <div class="rad-text <?= (substr($answerChoices[$key], 0, 1) == $answer->choice) ? (substr($answerChoices[$key], 0, 1) == $question->correct && (substr($answerChoices[$key], 0, 1) == $answer->choice) ? 'text-success' : 'text-danger') : 'text-white' ?>"><?= $answer->answer ?></div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="col-12">
                    <hr class="w-50 mx-auto">
                    <form class="row text-center mt-5 justify-content-center" action="" method="post">
                        <div id="errorMessage" class="col-12 d-flex flex-column align-items-center mt-5">
                            <h2>Commentaire</h2>
                            <textarea class="col-8" name="content" id="content" rows="5"></textarea>
                            <input id="btnComment" class="btnLog mt-3" type="button" value="Envoyer">
                        </div>
                        <div class="col-8 mt-5 textGreen">
                            <div id="allComments" class="row mx-auto bgDark rounded-3 mx-5">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-center fadeIn"><?= $quiz->quizName ?></h1>
                    <hr class="mx-auto w-25">
                    <?= $message ?>
                    <form id="formQuiz" method="post" class="row text-center justify-content-center mb-5">
                    </form>
                </div>
                <hr class="mx-auto w-75 fadeIn">
                <h2 class="text-center mt-5 fadeIn">Commentaires</h2>
                <div class="col-8 mt-5 text-center textGreen mb-5 fadeIn">
                    <div id="allComments" class="row rounded-3 bg-white">

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>