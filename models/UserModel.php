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
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE mail = ? LIMIT 1");
        $stmt->execute([$mail]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($inscrit !== false && password_verify($_POST['pwd'], $inscrit['mdp'])){
            SessionHelpers::login(array("username" => "{$inscrit["nom"]} {$inscrit["prenom"]}", "email" => $inscrit["mail"]));
            return true;
        }else{
            SessionHelpers::logout();
            return false;
        }        
    }

    public function register($name, $firstname, $password, $passwordC, $email)
    {
        $uppercase = preg_match('@[A-Za-z0-9]@', $password);

        $status = "";
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE mail=? LIMIT 1");
        $stmt->execute([$email]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($inscrit && $inscrit["mail"] == $email){
            return 0;
        }

        if(!$uppercase || strlen($password) < 8) {
            return 2;
        } 

        if ($password == $passwordC && $status==""){
            $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->pdo->prepare("INSERT INTO utilisateur VALUES (null, ? ,? ,? ,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $firstname);
            $stmt->bindParam(3, $email);    
            $stmt->bindParam(4, $password);
            $stmt->execute();
            SessionHelpers::login(array("username" => "{$inscrit["nom"]} {$inscrit["prenom"]}", "mail" => $inscrit["mail"]));

            return 1;
        }

        return 4;
    }
    
}

//password_verify($password, $inscrit['mail'])