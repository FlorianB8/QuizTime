<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Ajout catégorie</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelQuiz" class="textGreen" for="quiz">Nom :</label>
                        <input id="category" name="category" class="fieldForm p-2 mb-2" type="text" autocomplete="off">
                        <p id="errorCategory" class="errorMessage"><?= $error['category'] ?? '' ?></p>
                        <div class="d-flex align-items-center mt-3">
                            <label id="labelIcon" class="textGreen" for="icon">Icône :</label>
                        </div>
                        <input id="icon" name="icon" class="fieldForm p-2 " type="text" autocomplete="off">
                        <p id="errorIcon" class="errorMessage"><?= $error['icon'] ?? '' ?></p>
                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Ajouter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>