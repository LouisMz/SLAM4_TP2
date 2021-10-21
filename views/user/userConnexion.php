<div class="container p-3">
    <div class="card">
        <div class="card-body p-2">
            <form action="/user/connexion" method="post" class="add">
            <?php
                if ($error === 1) {
                    ?>
                    <div class="alert alert-danger">Mauvais mot de passe</div>
                    <?php
                }
                ?>
                <div class="input-group">
                    <p>Login</p>
                </div>
                <input id="mail" name="mail" type="text" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Adresse mail"/>
                <br>
                <div class="input-group">
                    <p>Mot de passe</p>
                </div>
                <input id="pwd" name="pwd" type="password" class="form-control" aria-label="My new idea" aria-describedby="basic-addon1" placeholder="Mot de passe"/>
                <br>
                <button type="submit" class="btn btn-dark">Se connecter</button>
            </form>
        </div>
    </div>
</div>