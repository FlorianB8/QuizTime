<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 mb-5">
                <div class="px-3 my-5">
                    <h1 class="mx-5 border-bottom border-3 fw-bold">Classement joueurs</h1>
                </div>
                <!-- Classement des 3 meilleurs utilisateurs -->
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark ranking">
                    <div class="px-3 text-center">
                        <table class="text-center mt-5 mx-auto">
                            <thead>
                                <tr>
                                    <th class="border-bottom border-3 ">
                                        <h2 class="mt-3 mx-5">Pseudo</h2>
                                    </th>
                                    <th class="border-bottom border-3 ">
                                        <h2 class="mt-3 mx-5">Points</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user) {  ?>
                                    <tr>
                                        <td>
                                            <h3 class="mt-5"><?= $user->pseudo ?></h3>
                                        </td>
                                        <td>
                                            <h3 class="mt-5"><?= $user->points ?></h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-8 my-5">
                <div class="my-4 d-flex flex-column justify-content-center">
                    <div class="px-3">
                        <h1 class=" mt-5 fw-bold">Améliores ton classement :</h1>
                        <hr>
                        <div class="delCarousel">
                            <ul class="row text-center">
                                <li class="col-12 col-lg-4 col-md-6 my-4">
                                    <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/harry potter.jpg" alt="Image du quiz Harry Potter"></a>
                                </li>
                                <li class="col-12 col-lg-4 col-md-6 my-4">
                                    <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/esport.jpg" alt="Image du quiz eSport"></a>
                                </li>
                                <li class="col-12 col-lg-4 col-md-6 my-4">
                                    <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/mythologie.jpg" alt="Image du quiz Mythologie"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>