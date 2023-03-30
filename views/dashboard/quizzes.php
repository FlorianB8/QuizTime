<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <?=$message?>
                <h1 class="text-center mt-5">Liste des quiz</h1>
                <hr class="mb-5">
                <a class="btnLog p-2" href="./../../controllers/dashboardAddQuizCtrl.php"><i class="m-4 fa-solid fa-plus"></i></a>
                <table class="tableDashboard">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Nom </td>
                            <td class="titleTable">Catégorie</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quizzes as $quiz) { ?>
                            <tr class="trDetails text-center">
                                <td><?= $quiz->quizName?></td>
                                <td><?= $quiz->categoryName?></td>
                                <td class=" optionsTable">
                                    <a class="" href="/controllers/dashboardQuizCtrl.php?id=<?=$quiz->id_quiz?>"><i class="fa-solid fa-eye"></i></a>
                                    <a class="text-danger" href=""><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                         } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>