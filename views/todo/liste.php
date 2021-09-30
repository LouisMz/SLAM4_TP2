<div class="container p-3">
    <div class="card">
        <div class="card-body p-2">
            <!-- Action -->
            <form action="./ajouter" method="post" class="add">
                <div class="input-group">
                    <input id="texte" name="texte" type="text" class="form-control" placeholder="Prendre une note…" aria-label="My new idea" aria-describedby="basic-addon1"/>
                </div>
            </form>

            <!-- Liste -->
            <ul class="list-group pt-3">
                <?php
                foreach ($todos as $todo) {
                    ?>
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div class="flex-grow-1 align-self-center"><?= $todo['texte'] ?></div>
                            <div>
                                <?php 
                                if($todo['termine']==0){
                                ?>
                                <a href="./terminer?id=<?= $todo['id'] ?>" class="btn btn-outline-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                    </svg>
                                </a>
                                <?php } 
                                else{ ?>
                                <a href="./supprimer?id<?= $todo['id'] ?>" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                    </svg>
                                </a>
                                <?php } ?>
                                <!-- Action à ajouter pour Supprimer -->
                            </div>
                        </div>
                    </li>
                    <?php
                }

                if (sizeof($todos) == 0) {
                    ?>
                    <li class="list-group-item text-center">C'est vide !</li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
