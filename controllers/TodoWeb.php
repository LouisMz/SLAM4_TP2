<?php
namespace controllers;

use controllers\base\Web;
use models\TodoModel;

class TodoWeb extends Web
{
    private $todoModel;

    function __construct(){
        $this->todoModel = new TodoModel();
    }

    function liste()
    {
        $this->header(); // Affichage de l'entête.
        $todos = $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        include("views/todo/liste.php"); // Affichage de votre vue.
        $this->footer(); // Affichage de votre pied de page.
    }

    function ajouter($texte = "")
    {
        $this->todoModel->ajouterTodo($texte);
        $this->redirect("./liste");
    }

    function terminer($id = ''){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }
        $this->redirect("./liste");
    }
    

}