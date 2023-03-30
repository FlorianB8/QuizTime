<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 ">
                <div class="alert alert-<?= $type ?? '' ?> mt-3"><?= $message ?? '' ?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Ajout Questions/Réponses</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelQuiz" class="textGreen" for="quiz">Question :</label>
                        <input id="question" name="question" class="fieldForm p-2 mb-2" type="text" autocomplete="off" >
                        <p id="errorQuestion" class="errorMessage"><?= $error['question'] ?? '' ?></p>
                        <label id="labelPoints" class="textGreen" for="quiz">Points :</label>
                        <input id="points" name="points" class="fieldForm p-2 mb-2" type="number" autocomplete="off">
                        <p id="errorQuestion" class="errorMessage"><?= $error['points'] ?? '' ?></p>
                        <div class="mt-3">
                            <label id="labelIcon" class="textGreen" for="icon">Réponses :</label>
                                <div class="d-flex flex-column">
                                    <input id="answer0" name="answer0" class="fieldForm p-2 mb-2" type="text" autocomplete="off" placeholder="Réponse a">
                                    <input id="answer1" name="answer1" class="fieldForm p-2 mb-2" type="text" autocomplete="off" placeholder="Réponse b">
                                    <input id="answer2" name="answer2" class="fieldForm p-2 mb-2" type="text" autocomplete="off" placeholder="Réponse c">
                                </div>
                                <p id="errorQuestion" class="errorMessage"><?= $error['Choice'] ?? '' ?></p>
                            <div class="mt-3">
                                <h4>Réponse correcte :</h4>
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">a</label>
                                <input name="correct" value="a" type="radio" class="p-2 mb-2" >
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">b</label>
                                <input name="correct" value="b" type="radio" class="p-2 mb-2" >
                                <label id="labelCorrect" class="textGreen ms-3" for="quiz">c</label>
                                <input name="correct" value="c" type="radio" class="p-2 mb-2" >
                            </div>
                        </div>
                        <label id="labelQuiz" class="textGreen" for="quiz">Quiz :</label>
                        <select class="form-select" name="quiz" id="quiz">
                            <?php foreach ($quizzes as $quiz) { ?>
                                <option value="<?= $quiz->id_quiz ?>"><?= $quiz->quizName ?></option>
                            <?php } ?>
                        </select>
                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Ajouter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>