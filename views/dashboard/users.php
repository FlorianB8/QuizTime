<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <?=$message?>
                <h1 class="text-center mt-5">Liste utilisateurs</h1>
                <hr class="mb-5">
                <table class="tableDashboard">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Pseudo</td>
                            <td class="titleTable">Email</td>
                            <td class="titleTable">Points</td>
                            <td class="titleTable">Role</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { 
                            if($user->role == 1) {
                                $userRole = 'Joueur';
                             }else {
                                $userRole = 'Admin';
                             } ?>
                            <tr class="trDetails text-center">
                                <td><?= $user->pseudo?></td>
                                <td><a href="mailto:<?=$user->email?>"> <?= $user->email?></a></td>
                                <td><?= $user->points?></td>
                                <td><?= $userRole?></td>
                                <td class=" optionsTable">
                                    <a class="mt-2" href="../../controllers/dashboardProfilUserCtrl.php?id=<?=$user->id?>"><i class="fa-solid fa-eye"></i></a>
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
                                            <a class="btn btn-danger" href="../../controllers/dashboardDeleteUserCtrl.php?id=<?=$user->id?>">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                         } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>