<main>
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-12 col-lg-10">
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark presentation">
                    <h1 class="text-center">Tu veux améliorer ta culture générale ?<br> <span class="textGreen fw-bold"> QuizTime</span> est là pour toi !</h1>
                    <p class="text-center my-5">Profite d’une large sélection de quiz avec différentes catégories pour développer ta culture générale et impressionner tes proches !</p>
                </div>
            </div>

            <div class="col-12 p-0 wave">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1536" height="150" preserveAspectRatio="none" viewBox="0 0 1440 560">
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
                                <h1 class="text-center fw-bold">Catégories de quiz</h1>
                            </div>
                            <div class="text-center d-flex flex-column">
                                <div class="bgGreen category p-3 my-4 mx-auto"><!-- Affichage de la catégorie à gauche -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-film me-4"></i></i>Cinéma</a>
                                </div>
                                <hr class="w-50 textGreen mx-auto">
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à droite -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-landmark me-4"></i>Culture</i></a>
                                </div>
                                <hr class="w-50 textGreen mx-auto">
                                <div class="bgGreen category p-3 my-4 mx-auto">
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-gamepad me-4"></i>Jeux-vidéos</a>
                                </div>
                                <hr class="w-50 textGreen mx-auto">
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à droite -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-robot me-4"></i>Technologies</a>
                                </div>
                                <div class="navbar-nav mx-auto mt-5 textDark">
                                    <a href="../../controllers/categoryCtrl.php" class="nav-item nav-link btnLog  linkLog">Voir plus</a>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------->
                    </div>
                    <!-- Quiz les plus populaires du site -->
                    <div class="col-12 col-lg-5 p-0 ">
                        <div class="my-4 d-flex flex-column justify-content-center">
                            <div class="px-3 textGreen bor">
                                <h1 class="text-center my-5 fw-bold" >Quiz populaires</h1>
                                <div class="delCarousel">
                                    <ul class="row text-center">
                                        <li class="col-12 my-4">
                                            <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/harry potter.jpg" alt="Image du quiz Harry Potter"></a>
                                        </li>
                                        <li class="col-12 my-4">
                                            <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/esport.jpg" alt="Image du quiz eSport"></a>
                                        </li>
                                        <li class="col-12 my-4">
                                            <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/mythologie.jpg" alt="Image du quiz Mythologie"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------->
                </div>
            </div>
            <div class="col-12 rotate wave p-0">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1536" height="150" preserveAspectRatio="none" viewBox="0 0 1440 560">
                    <g mask="url(&quot;#SvgjsMask1062&quot;)" fill="none">
                        <path d="M 0,442 C 144,409.4 432,288.6 720,279 C 1008,269.4 1296,371 1440,394L1440 560L0 560z" fill="rgba(32, 32, 32, 1)"></path>
                    </g>
                </svg>  
            </div>
            <div class="col-12 col-lg-8">
                <!-- Classement des 3 meilleurs utilisateurs -->
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark ranking">
                    <div class="px-3 text-center">
                        <h1 class="mb-4 fw-bold">Top joueurs</h1>
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
                                <tr>
                                    <td>
                                        <h3 class="mt-5">Joueur 1</h3> 
                                    </td>
                                    <td>
                                        <h3 class="mt-5">200</h3> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Joueur 2</h3> 
                                    </td>
                                    <td>
                                        <h3>125</h3> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Joueur 3</h3> 
                                    </td>
                                    <td>
                                        <h3>100</h3> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-------------------------------------------->
            </div>
        </div>
    </div>
</main>