<footer>
    <div class=" wave">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" preserveAspectRatio="none" viewBox="0 0 1440 560">
            <g mask="url(&quot;#SvgjsMask1062&quot;)" fill="none">
                <path d="M 0,442 C 144,409.4 432,288.6 720,279 C 1008,269.4 1296,371 1440,394L1440 560L0 560z" fill="rgba(32, 32, 32, 1)"></path>
            </g>
        </svg>
    </div>
    <div class="container-fluid  text-center">
        <div class="row justify-content-center">
            <div class="col-12 footer">
                <nav class="navFooter">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="navbar-nav textGreen my-5">
                                <h2 class="fw-bold">Accès rapide</h2>
                                <hr class="textGreen">
                                <a class="linkPage nav-link mx-4" href="/">Accueil</a>
                                <a href="/categories" class="mx-4 nav-link linkPage">Catégories</a>
                                <a href="/classement" class="mx-4 nav-link linkPage">Classement</a>
                                <a href="/contactez-nous" class="mx-4 nav-link linkPage" tabindex="-1">Contact</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="navbar-nav textGreen my-5">
                                <h2 class="fw-bold">Informations</h2>
                                <hr class="textGreen">
                                <a class="linkPage nav-link" href="/contactez-nous">Contactez nous</a>
                                <a class="linkPage nav-link" href="/mentions-legales">Mentions légales</a>
                                <a class="linkPage nav-link" href="/cgu">CGU</a>
                            </div>
                        </div>
                    </div>

                </nav>
                <div class="col-12 mt-5">
                    <p class="textGreen">© by Florian from the Manu Amiens</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://kit.fontawesome.com/4ec4664b92.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php if ($script ?? false) { ?>
    <script src="../../public/assets/js/<?=$script?>.js"></script>
<?php } ?>
</body>

</html>