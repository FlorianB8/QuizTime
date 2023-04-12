<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <?= $message ?>
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark presentation fadeIn">
                    <h1 class="text-center">Tu veux améliorer ta culture générale ?<br> <span class="textGreen fw-bold"> QuizTime</span> est là pour toi !</h1>
                    <p class="text-center my-5">Profite d’une large sélection de quiz avec différentes catégories pour développer ta culture générale et impressionner tes proches !</p>
                </div>
            </div>

            <div class="col-12 p-0 wave">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" preserveAspectRatio="none" viewBox="0 0 1440 560">
                    <g mask="url(&quot;#SvgjsMask1062&quot;)" fill="none">
                        <path d="M 0,442 C 144,409.4 432,288.6 720,279 C 1008,269.4 1296,371 1440,394L1440 560L0 560z" fill="rgba(32, 32, 32, 1)"></path>
                    </g>
                </svg>
            </div>
            <div class="col-12 bgDark">

                <div class="row justify-content-around">
                    <!-- Différentes catégories de quiz -->
                    <div class="col-12 col-lg-7 p-0 borderGreenRight ">
                        <div class="my-4 d-flex flex-column justify-content-center textGreen">
                            <div class="px-3 my-5">
                                <h1 class="text-center fw-bold fadeIn">Catégories de quiz</h1>
                            </div>
                            <div class="text-center d-flex flex-column">
                                <?php foreach ($categories as $category) { ?>
                                    <a class="fadeIn bgGreen linkCategory category p-3 my-4 mx-auto" href="/les-quiz?id=<?= $category->id ?>">
                                        <i class="<?= $category->icon ?> me-4"></i><?= htmlspecialchars($category->name) ?>
                                    </a>
                                    <hr class="w-50 textGreen mx-auto">

                                <?php } ?>
                                <div class="navbar-nav mx-auto mt-5 textDark">
                                    <a href="/categories" class="nav-item nav-link btnMoreCategory  linkLog">Voir plus</a>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------->
                    </div>
                    <!-- Quiz les plus populaires du site -->
                    <div class="col-12 col-lg-5 p-0 ">
                        <div class="my-4 d-flex flex-column justify-content-center">
                            <div class="px-3 textGreen">
                                <h1 class="text-center my-5 fw-bold fadeIn">Gagne des points : </h1>
                                <div class="delCarousel">
                                    <ul class="row text-center">
                                        <?php foreach ($thirdQuizzes as $quiz) {  ?>
                                            <li class="col-12 my-4 fadeIn">
                                                <a href="/jouer-quiz?id=<?=$quiz->id?>"><img class="imgQuiz" src="../public/assets/uploads/imgQuiz/imgQuiz<?= $quiz->id?>.jpg" alt="Image du quiz <?=$quiz->name?>"></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------->
                </div>
            </div>
            <div class="col-12 rotate wave p-0">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" preserveAspectRatio="none" viewBox="0 0 1440 560">
                    <g mask="url(&quot;#SvgjsMask1062&quot;)" fill="none">
                        <path d="M 0,442 C 144,409.4 432,288.6 720,279 C 1008,269.4 1296,371 1440,394L1440 560L0 560z" fill="rgba(32, 32, 32, 1)"></path>
                    </g>
                </svg>
            </div>
            <div class="col-8 mb-5">
                <div class="px-3 my-5">
                    <h1 class="mx-5 border-bottom border-3 fw-bold text-center">Meilleurs joueurs</h1>
                </div>
                <!-- Classement des 3 meilleurs utilisateurs -->
                <div class="m-lg-5 my-5 d-flex flex-column align-items-center justify-content-center textDark ranking">
                    <div class="px-3 text-center">
                        <table class="text-center mt-5">
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
        </div>
    </div>
</main>