<?php 


?>

<main>
    <div class="container-fluid bgBlue">
        <div class="row justify-content-center mx-5 w-75 mx-auto rounded-4 my-lg-0 my-5">
            <div class="col-lg-10 p-0 m-0 d-flex justify-content-center mt-lg-5 mt-0 ">
                <button id="btnLog" class="btnActiveLogin">Connexion</button>
                <button id="btnReg" class="btnRegister">Inscription</button>
            </div>
            <div id="login" class="col-12 col-lg-10 formLog bgDark  " <?=$hiddenLogin ?? ''?>>
                <div class="my-5">
                    <h1 class="textGreen text-center fw-bold">Connexion</h1>
                    <hr class="textGreen">
                </div>
                <!-- Formulaire pour la connexion -->
                <form class="d-flex flex-column my-5 w-75 mx-auto" action="">
                    <label class="textGreen" for="pseudoLogin">Pseudo :</label>
                    <input id="pseudoLogin" class="fieldForm p-2 mb-4" type="text" >
                    <label class="textGreen" for="passwordLogin">Mot de passe :</label>
                    <input id="passwordLogin" class="fieldForm p-2 mb-4" type="password">
                    <a class="textGreen forgot text-end" href="">Mot de passe oublié ?</a>
                    <div class="mx-auto">
                        <input class="btnFormSubmit fieldForm my-3" type="submit" name="confirmLogin" id="confirmLogin" value="Connexion">
                    </div>
                </form>
                <!--------------------------------->
            </div>
            <div id="register" class="col-12 col-lg-10 formLog bgDark " <?=$hiddenRegister ?? 'hidden'?>>
                <div class="my-5">
                    <h1 class="textGreen text-center fw-bold">Pas encore inscrit ? <br> Rejoins nous !</h1>
                    <hr class="textGreen">
                </div>
                <!-- Formulaire pour l'inscription -->
                <form class="d-flex flex-column my-5 w-75 mx-auto" method="post">
                    <label class="textGreen" for="pseudoRegister">Pseudo* :</label>
                    <input id="pseudoRegister" name="pseudoRegister" class="fieldForm p-2 " type="text" autocomplete="off">
                    <p class="errorMessage"><?=$error['pseudo'] ?? ''?></p>    
                    <label class="textGreen mt-4" for="emailRegister">E-mail* :</label>
                    <input id="emailRegister" name="emailRegister" class="fieldForm p-2 " type="email" autocomplete="off">
                    <p class="errorMessage"><?=$error['email'] ?? ''?></p>
                    <label class="textGreen mt-4" for="passwordRegister">Mot de passe* :</label>
                    <input id="passwordRegister" name="passwordRegister" class="fieldForm p-2 " type="password" autocomplete="off">
                    <p class="errorMessage"><?=$error['passwordRegister'] ?? ''?></p>
                    <label class="textGreen mt-4" for="passwordConfirmRegister">Mot de passe de confirmation* :</label>
                    <input id="passwordConfirmRegister" name="passwordConfirmRegister" class="fieldForm p-2 " type="password">
                    <div class="mx-auto mt-4">
                        <input class="btnFormSubmit my-3" type="submit" name="confirmRegister" id="confirmRegister" value="Inscription">
                    </div>
                </form>
               
                <!------------------------------------>
            </div>
        </div>
    </div>
</main>