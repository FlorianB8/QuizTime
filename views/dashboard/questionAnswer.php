<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <?= $message ?>
                <h1 class="text-center mt-5">Liste des questions</h1>
                <hr class="mb-5">
                <a class="btnLog p-2" href="./../../controllers/dashboardAddQuestionAnswerCtrl.php"><i class="m-4 fa-solid fa-plus"></i></a>
                <table class="tableDashboard">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Questions</td>
                            <td class="titleTable">Points</td>
                            <td class="titleTable">Réponse correct</td>
                            <td class="titleTable">Quiz</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $question) { ?>
                            <tr class="trDetails text-center">
                                <td><?= $question->question ?></td>
                                <td><?= $question->points ?></td>
                                <td><?= $question->correct ?></td>
                                <td><?= $question->name ?></td>
                                <td class=" optionsTable">
                                    <a class="" href="/controllers/dashboardUpdateQuestionAnswerCtrl.php?id=<?= $question->id ?>"><i class="fa-solid fa-eye"></i></a>
                                    <a class="text-danger" href="/controllers/dashboardDeleteQuestionAnswerCtrl.php?id=<?= $question->id ?>"><i class="fa-solid fa-trash"></i></a>
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