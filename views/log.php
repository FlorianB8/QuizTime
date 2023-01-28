<main>
    <div class="container-fluid bgBlue">
        <div class="row justify-content-center ">
            <div class="col-12 col-lg-4 me-lg-5 formLog">
                <div class="px-3 my-5">
                    <h1 class="textGreen text-center">Connexion</h1>
                </div>
                <!-- Formulaire pour la connexion -->
                <form class="d-flex flex-column my-5" action="">
                    <label class="textGreen mt-5" for="pseudoLogin">Pseudo :</label>
                    <input id="pseudoLogin" class="fieldForm p-2 mb-4" type="text" >
                    <label class="textGreen" for="passwordLogin">Mot de passe :</label>
                    <input id="passwordLogin" class="fieldForm p-2 mb-4" type="password">
                    <div class="mx-auto">
                        <input class="btnFormSubmit fieldForm my-3" type="submit" name="confirmLogin" id="confirmLogin" value="Connexion">
                    </div>
                </form>
                <!--------------------------------->
            </div>
            <div class="col-12 col-lg-4 ms-lg-5 formLog ">
                <div class="px-3 my-5">
                    <h1 class="textGreen text-center">Pas encore inscrit ? <br> Rejoins nous !</h1>
                </div>
                <!-- Formulaire pour l'inscription -->
                <form class="d-flex flex-column my-5 " action="">
                    <label class="textGreen" for="pseudoRegister">Pseudo* :</label>
                    <input id="pseudoRegister" class="fieldForm p-2 mb-4" type="text" autocomplete="off">
                    <label class="textGreen" for="mailRegister">E-mail* :</label>
                    <input id="mailRegister" class="fieldForm p-2 mb-4" type="email" autocomplete="off">
                    <label class="textGreen" for="passwordRegister">Mot de passe* :</label>
                    <input id="passwordRegister" class="fieldForm p-2 mb-4" type="password" autocomplete="off">
                    <label class="textGreen" for="passwordConfirmRegister">Mot de passe de confirmation* :</label>
                    <input id="passwordConfirmRegister" class="fieldForm p-2 mb-4" type="password">
                    <div class="mx-auto">
                        <input class="btnFormSubmit my-3" type="submit" name="confirmRegister" id="confirmRegister" value="Inscription">
                    </div>
                </form>
                <!------------------------------------>
            </div>
        </div>
    </div>
</main>