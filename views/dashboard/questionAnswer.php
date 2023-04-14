<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?= $message ?>
                <h1 class="text-center mt-5">Liste des questions</h1>
                <hr class="mb-5">
                <div class="d-flex ms-auto w-25">
                    <select class="form-select ms-auto me-5" name="limit" id="limit">
                        <option value="8">8</option>
                        <option value="16">16</option>
                        <option value="32">32</option>
                        <option value="64">64</option>
                    </select>
                    <input class="form-control ms-auto" placeholder="Rechercher.." id="search" type="search">
                </div>
                <a class="btnLog p-2" href="./../../controllers/dashboardAddQuestionAnswerCtrl.php"><i class="m-4 fa-solid fa-plus"></i></a>
                <table id="table" class="tableDashboard mb-5">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Questions</td>
                            <td class="d-md- titleTable">Points</td>
                            <td class="d-md- titleTable">Réponse correct</td>
                            <td class="titleTable">Quiz</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody id="list"> 
                        <?php foreach ($questions as $question) { ?>
                            <tr class="trDetails text-center">
                                <td><?= $question->question ?></td>
                                <td><?= $question->points ?></td>
                                <td><?= $question->correct ?></td>
                                <td><?= $question->name ?></td>
                                <td class=" optionsTable">
                                    <a class="mt-2" href="/controllers/dashboardUpdateQuestionAnswerCtrl.php?id=<?= $question->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
                                            <a class="btn btn-danger" href="/controllers/dashboardDeleteQuestionAnswerCtrl.php?id=<?= $question->id ?>">Supprimer</a>
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