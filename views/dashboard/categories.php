<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <?= $message ?>
                <h1 class="text-center mt-5">Liste des catégories</h1>
                <hr class="mb-5">
                <table class="tableDashboard">
                    <thead>
                        <tr class="text-center">
                            <td class="titleTable radiusFirst">Nom</td>
                            <td class="titleTable">Icône</td>
                            <td class="titleTable lastTable radiusLast"><i class="fa-solid fa-gear"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) { ?>
                            <tr class="trDetails text-center">
                                <td><?= $categorie->name ?></td>
                                <td><i class="?= <?= $categorie->icon ?>"></i></td>
                                <td class=" optionsTable">
                                    <a class="" href="/controllers/dashboardUpdateCategoryCtrl.php?id=<?= $categorie->id ?>"><i class="fa-solid fa-eye"></i></a>
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