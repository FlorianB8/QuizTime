<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 ">
                <div class="alert alert-<?= $type ?? '' ?> mt-3"><?= $message ?? '' ?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Modification Quiz</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelQuiz" class="textGreen" for="quiz">Nom :</label>
                        <input id="quizName" name="quizName" class="fieldForm p-2 mb-2" type="text" autocomplete="off" value="<?= $quiz->quizName ?>">
                        <p id="errorQuizName" class="errorMessage"><?= $error['quizName'] ?? '' ?></p>
                       
                        <label class="mt-4" for="category">Choix catégorie :</label>
                        <select class="form-select" name="category" id="category">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?=$category->id?>"><?=$category->name?></option>
                            <?php } ?>
                        </select>
                        <p id="errorCategory" class="errorMessage"><?= $error['category'] ?? '' ?></p>
                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>