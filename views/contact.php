<main>
    <div class="container-fluid bgBlue">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 formContact">
                <div class="px-3 my-5">
                    <h1 class="textGreen text-center">Contact</h1>
                </div>
                <!-- Formulaire de contact -->
                <form class="d-flex flex-column my-5 contact" method="post">
                    <label class="textGreen" for="pseudoContact">Pseudo :</label>
                    <input class="fieldForm p-2 mb-4" type="text" id="pseudoContact">
                    <label class="textGreen" for="emailContact">E-mail :</label>
                    <input class="fieldForm p-2 mb-4" type="email" id="emailContact">
                    <label class="textGreen" for="messageContact">Message :</label>
                    <textarea class="fieldForm p-2 mb-4" name="messageContact" id="messageContact" cols="30" rows="5" placeholder="200 caractères max*"></textarea>
                    <div class="mx-auto">
                        <input class="btnFormSubmit my-3" type="submit" name="confirmContact" id="confirmContact" value="Envoyer">
                    </div>
                </form>
                <!--------------------------->
            </div>
        </div>
    </div>
</main>