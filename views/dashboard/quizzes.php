<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?=$message?>
                <h1 class="text-center mt-5">Liste des quiz</h1>
                <hr class="mb-5">
                <div class="d-flex ms-auto w-25">
                    <select class="form-select ms-auto me-5" name="limit" id="limit">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                    <input class="form-control ms-auto" placeholder="Rechercher.." id="search" type="search">
                </div>
                <a class="btnLog p-2" href="./../../controllers/dashboardAddQuizCtrl.php"><i class="m-4 fa-solid fa-plus"></i></a>
                <table class="tableDashboard">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Nom </td>
                            <td class="titleTable">Catégorie</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody id="list">
                        <?php foreach ($quizzes as $quiz) { ?>
                            <tr class="trDetails text-center">
                                <td><?= $quiz->quizName?></td>
                                <td><?= $quiz->categoryName?></td>
                                <td class=" optionsTable">
                                    <a class="mt-2" href="/controllers/dashboardQuizCtrl.php?id=<?=$quiz->id_quiz?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteLabel">Êtes vous sûr de vouloir supprimer ?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a class="btn btn-danger" href="/controllers/dashboardDeleteQuizCtrl.php?id=<?=$quiz->id_quiz?>">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                         } ?>
                    </tbody>
                </table>
                <input type="number" hidden id="offset" value="1">

            </div>
        </div>
    </div>
</main>