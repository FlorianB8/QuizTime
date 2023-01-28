<main>
    <div class="container-fluid">
        <div class="row justify-content-center test">
            <div class="col-12 col-lg-10">
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark presentation">
                    <h1 class="text-center">Tu veux améliorer ta culture générale ?<br> <span class="textGreen"> QuizTime</span> est là pour toi !</h1>
                    <p class="text-center my-5">Profite d’une large sélection de quiz avec différentes catégories pour développer ta culture générale et impressionner tes proches !</p>
                </div>
            </div>
            <div class="col-12 bgDark">
                <div class="row justify-content-around">
                    <!-- Différentes catégories de quiz -->
                    <div class="col-12 col-lg-7 p-0 borderGreenRight ">
                        <div class="my-4 d-flex flex-column justify-content-center textGreen">
                            <div class="px-3 my-5">
                                <h1 class="text-center">Catégorie de quiz</h1>
                            </div>
                            <div class="text-center d-flex flex-column">
                                <div class="bgGreen category p-3 my-4 mx-auto"><!-- Affichage de la catégorie à gauche -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-earth-americas me-4"></i>Géographie</a>
                                </div>
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à droite -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-landmark me-4"></i>Mythologie</i></a>
                                </div>
                                <!-- Affichage de la catégorie à gauche -->
                                <div class="bgGreen category p-3 my-4 mx-auto">
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-flask me-4"></i>Sciences</a>
                                </div>
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à droite -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-palette me-4"></i>Arts</a>
                                </div>
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à gauche -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-robot me-4"></i>Technologies</a>
                                </div>
                                <div class="bgGreen category p-3 my-4 mx-auto"> <!-- Affichage de la catégorie à droite -->
                                    <a class="linkCategory" href="./category.php"><i class="fa-solid fa-gamepad me-4"></i>Jeux-vidéos</a>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------->
                    </div>
                    <!-- Quiz les plus populaires du site -->
                    <div class="col-12 col-lg-5 p-0 ">
                        <div class="my-4 d-flex flex-column justify-content-center">
                            <div class="px-3 textGreen bor">
                                <h1 class="text-center my-5">Quiz populaires</h1>
                                <div class="slider carouselMobile">
                                    <ul class="slides-container ">
                                        <li class="slide ">
                                            <div class="parallax divCarousel ">
                                                <a href="./categorie.html"><img class="imgQuizCarousel" src="../public/assets/imgs/harry potter.jpg" alt="Image du quiz Harry Potter"></a>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <div class="parallax divCarousel">
                                                <img class="imgQuizCarousel" src="../public/assets/imgs/esport.jpg" alt="Image du quiz eSport"></a>
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <div class="parallax divCarousel">
                                                <img class="imgQuizCarousel" src="../public/assets/imgs/mythologie.jpg" alt="Image du quiz Mythologie">
                                            </div>
                                        </li>
                                        <li class="slide">
                                            <div class="parallax divCarousel">
                                                <img class="imgQuizCarousel" src="../public/assets/imgs/spiderman.jpg" alt="Image du quiz intelligences artificielles">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
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
                                        <li class="col-12 my-4">
                                            <a href="./quiz.html"><img class="imgQuiz" src="../public/assets/imgs/spiderman.jpg" alt="Image du quiz intelligences artificielles"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------->
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <!-- Classement des 3 meilleurs utilisateurs -->
                <div class="m-lg-5 my-5 d-flex flex-column justify-content-center textDark ranking">
                    <div class="px-3">
                        <h1 class="borderBlue">Top utilisateurs</h1>
                    </div>
                    <div class="d-flex justify-content-around my-5">
                        <p class="player1">Joueur 1</p>
                        <p class="player2">Joueur 2</p>
                        <p class="player3">Joueur 3</p>
                    </div>
                </div>
                <!-------------------------------------------->
            </div>
        </div>
    </div>
</main>