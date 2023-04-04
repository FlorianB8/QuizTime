<main>
    <p id="idQuiz" class="d-none"><?=$id?></p>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center"><?=$quiz->quizName?></h1>
                <hr class="mx-auto w-25">
                <?=$message?>    
                <form id="formQuiz" method="post" class="row text-center justify-content-center mb-5">
                </form>
            </div>
            <div class="col-12">
                <hr class="w-50 mx-auto">
                <form class="row text-center mt-5 justify-content-center" action="" method="post">
                    <div class="col-12 mt-5">
                        <h2>Commentaire</h2>
                    </div>
                    <textarea class="col-8" name="comment" id="comment" rows="10"></textarea>
                    <div class="col-8 mt-5 textGreen">
                        <div class="row mx-auto bgDark rounded-3 mx-5">
                            <?php foreach ($comments as $comment) { ?>
                                <hr class="w-50 mx-auto">
                                <div class="col-12 my-5">
                                    <h4 class="">Auteur :   <?= $comment->pseudo ?></h4>
                                    <p class="text-center">"<?= $comment->content ?>"</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>