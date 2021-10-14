<?php
namespace models;

use models\base\SQL;
use utils\SessionHelpers;


class UserModel extends SQL
{
    public function __construct()
    {
        parent::__construct('id', 'nom', 'prenom', 'mail', 'mdp');
    }

    function userConnexion($mail, $password){
        $stmt = $this->pdo->prepare("SELECT mail, mdp FROM utilisateur WHERE mail = ? LIMIT 1");
        $stmt->execute([$mail]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($inscrit !== false && $_POST['pwd'] == $inscrit['mdp']){
            SessionHelpers::login(array("username" => "{$inscrit["nom"]} {$inscrit["prenom"]}", "email" => $inscrit["mail"]));
            return true;
        }else{
            SessionHelpers::logout();
            return false;
        }        
    }
    
}

//password_verify($password, $inscrit['mail'])