<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 ">
                <div class="my-4 d-flex flex-column justify-content-center">
                    <div class="px-3 textDark ">
                        <h1 class="text-center my-5 fw-bold"> <i class="<?=$category->icon?>"></i> <?=$category->name?></h1>
                        <hr class="w-75 mx-auto">
                        <ul class="row text-center">
                            <li class="col-12 col-lg-4 my-4">
                                <a href="../controllers/quizCtrl.php"><img class="imgQuiz" src="../public/assets/imgs/harry potter.jpg" alt="Image du quiz Harry Potter"></a>
                            </li>
                            <li class="col-12 col-lg-4 my-4">
                                <a href="../controllers/quizCtrl.php"><img class="imgQuiz" src="../public/assets/imgs/esport.jpg" alt="Image du quiz eSport"></a>
                            </li>
                            <li class="col-12 col-lg-4 my-4">
                                <a href="../controllers/quizCtrl.php"><img class="imgQuiz" src="../public/assets/imgs/mythologie.jpg" alt="Image du quiz Mythologie"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>