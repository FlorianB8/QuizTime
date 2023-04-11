<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="alert alert-<?= $type ?? '' ?> mt-3"><?= $message ?? '' ?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Modification Questions/Réponses</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelQuiz" class="textGreen" for="quiz">Question :</label>
                        <input id="question" name="question" class="fieldForm p-2 mb-2" type="text" autocomplete="off" value="<?= $question->question ?>">
                        <p id="errorQuestion" class="errorMessage"><?= $error['question'] ?? '' ?></p>
                        <label id="labelPoints" class="textGreen" for="quiz">Points :</label>
                        <input id="points" name="points" class="fieldForm p-2 mb-2" type="number" autocomplete="off" value="<?= $question->points ?>">
                        <p id="errorQuestion" class="errorMessage"><?= $error['points'] ?? '' ?></p>
                        <div class="mt-3">
                            <label id="labelIcon" class="textGreen" for="icon">Réponses :</label>
                            <?php foreach ($answers as $cpt => $answer) { ?>
                                <div>
                                    <input type="text" name="idAnswer<?=$cpt?>" value='<?=$answer->id?>' hidden>
                                    <input id="answer<?= $cpt ?>" name="answer<?= $cpt ?>" class="fieldForm p-2 mb-2" type="text" autocomplete="off" value="<?= $answer->answer ?>">
                                    <input readonly id="choice<?= $cpt ?>" name="choice<?= $cpt ?>" class="border-0 text-white p-2 mb-2 bgDark" type="text" autocomplete="off" value="<?= $answer->choice ?>">
                                </div>
                                <p id="errorQuestion" class="errorMessage"><?= $error['Choice'] ?? '' ?></p>
                            <?php } ?>
                            <div class="mt-3">
                                <h4>Réponse correcte :</h4>
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">a</label>
                                <input name="correct" value="a" type="radio" class="p-2 mb-2" <?= ($question->correct == 'a') ? 'checked' : '' ?>>
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">b</label>
                                <input name="correct" value="b" type="radio" class="p-2 mb-2" <?= ($question->correct == 'b') ? 'checked' : '' ?>>
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">c</label>
                                <input name="correct" value="c" type="radio" class="p-2 mb-2" <?= ($question->correct == 'c') ? 'checked' : '' ?>>
                            </div>
                        </div>
                        <label id="labelQuiz" class="textGreen" for="quiz">Quiz :</label>
                        <select class="form-select" name="quiz" id="quiz">
                            <?php foreach ($quizzes as $quiz) { ?>
                                <option value="<?= $quiz->id_quiz ?>" <?= ($question->id_quiz == $quiz->id_quiz) ? 'selected' : '' ?>><?= $quiz->quizName ?></option>
                            <?php } ?>
                        </select>
                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>