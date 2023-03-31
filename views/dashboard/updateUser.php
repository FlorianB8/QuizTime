<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 ">
                <div class="alert alert-<?=$type ?? ''?> mt-3"><?=$message ?? ''?></div>
                <div class="bgDark textGreen mt-5 rounded-3 w-75 mx-auto">
                    <h1 class="text-center pt-3">Modification</h1>
                    <hr class="mb-5 w-75 mx-auto">
                    <form class="d-flex flex-column my-5 w-75 mx-auto pb-3" method="post">
                        <label id="labelPseudo" class="textGreen" for="pseudo">Pseudo :</label>
                        <input id="pseudo" name="pseudo" class="fieldForm p-2 " type="text" autocomplete="off" value="<?=$pseudo ??  $user->pseudo ?>">
                        <p id="errorPseudo" class="errorMessage"><?=$error['pseudo'] ?? ''?></p>    
                        <label for="points">Points</label>
                        <input class="mb-3" type="number" name="points" value="<?=$points ?? $user->points?>">
                        <label class="" for="role">Choix rôle</label>
                        <select name="role" id="role">
                            <option value="1">Joueur</option>
                            <option value="2">Admin</option>
                        </select>
                        <p id="errorRole" class="errorMessage"><?=$error['role'] ?? ''?></p>
                         
                        <div class="mx-auto mt-4">
                            <input class="btnFormSubmit my-3" type="submit" name="confirm" id="confirm" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>