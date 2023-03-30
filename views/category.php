<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="my-5 d-flex flex-column justify-content-center">
                    <div class="px-3 my-5">
                        <h1 class="mx-5 border-bottom border-3">Catégories de quiz</h1>
                    </div>
                    <div class="text-center">
                        <div class="row">
                            <?php foreach ($categories as $category) { ?>
                                <div class="col-lg-6 col-12">
                                    <div class="bgDark category p-3 my-4 mx-auto"><!-- Affichage de la catégorie à gauche -->
                                        <a class="linkCategory textGreen" href="../controllers/quizzesCtrl.php?id=<?=$category->id?>"><i class="<?= $category->icon ?> me-4"></i> <?= $category->name ?></a>
                                    </div>
                                </div>
                            <?php } ?>

                            
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------->
            </div>
        </div>
    </div>
</main>