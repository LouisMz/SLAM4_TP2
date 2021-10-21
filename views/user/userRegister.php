<div class="container p-3">
    <div class="card">
        <div class="card-body p-2">
            <form action="./register" method="post" class="add">
            <?php
                if ($error === 4) {
                    ?>
                    <div class="alert alert-danger">Les mots de passe ne sont pas identiques</div>
                    <?php
                }
                ?>
                <?php
                if ($error === 2) {
                    ?>
                    <div class="alert alert-danger">Le mot de passe n'est pas comforme. Il faut au minimum: majuscule, minuscule, numéro</div>
                    <?php
                }
                ?>
                <?php
                if ($error === 0) {
                    ?>
                    <div class="alert alert-danger">Vous possédez déjà un compte, <a href="/user/connexion">Connectez vous</a></div>
                    <?php
                }
            ?>
                <div class="input-group">
                    <p>Nom</p>
                </div>
                <input id="name" name="name" type="text" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Nom"/>
                <br>
                <div class="input-group">
                    <p>Prénom</p>
                </div>
                <input id="firstname" name="firstname" type="text" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Adresse mail"/>
                <br>
                <div class="input-group">
                    <p>Adresse Mail</p>
                </div>
                <input id="mail" name="mail" type="text" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Adresse mail"/>
                <br>
                <div class="input-group">
                    <p>Mot de passe</p>
                </div>
                <input id="pwd" name="pwd" type="password" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Mot de passe"/>
                <br>
                <div class="input-group">
                    <p>Confirmer le mot de passe</p>
                </div>
                <input id="pwdC" name="pwdC" type="password" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Mot de passe"/>
                <br>
                <button type="submit" class="btn btn-dark">S'inscrire</button>
            </form>
        </div>
    </div>
</div>