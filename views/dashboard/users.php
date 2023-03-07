<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
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
                                    <a class="" href="../../controllers/dashboardProfilUserCtrl.php?id=<?=$user->id?>"><i class="fa-solid fa-eye"></i></a>
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