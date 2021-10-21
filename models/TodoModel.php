<?php
namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function voirTodo(){
        $account = SessionHelpers::getConnected();
        var_dump($account['idUti']);
        $idUti = $account['idUti'];
        $stmt = $this->pdo->prepare("SELECT * FROM todos INNER JOIN utilisateur ON todos.idUti = utilisateur.id WHERE utilisateur.id = ? AND termine = 0");
        $stmt->execute([$idUti]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function todoNonTermine()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE termine = 1;");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine =1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function ajouterTodo($texte){
        $account = SessionHelpers::getConnected();
        $idUti = $account['idUti'];
        if ($texte != ""){
            $stmt = $this->pdo->prepare("INSERT INTO todos VALUES (null, ?, 0, null, ?)");
            $stmt->execute([$texte, $idUti]);
        }
    }

    function supprimerTodo($id){
            $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?");
            $stmt->execute([$id]);
    }
}