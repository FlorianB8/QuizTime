<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 d-flex justify-content-center mt-5">
                <div class="mx-5 cardProfil bgDark textGreen">
                    <div class="">
                        <div class="text-center me-5">
                            <h1>Modification Quiz</h1>
                            <hr>
                        </div>
                        <ul class="profilInfo">
                            <li>Nom : <span class="ms-2"><?= $quiz->quizName ?></span> </li>
                            <li>Catégorie : <span class="ms-2"><?= $quiz->categoryName ?></span> </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <a href="/controllers/dashboardUpdateQuizCtrl.php?id=<?=$quiz->id_quiz?>" class=" text-center btnLog bgGreen mt-4">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>