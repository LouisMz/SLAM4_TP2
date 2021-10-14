<?php
namespace controllers;

use controllers\base\Web;
use models\UserModel;

class UserWeb extends web
{
    private $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    function connexion()
    {
        $error = false;
        if(isset($_POST['mail']) && isset($_POST['pwd'])){
            if($this->userModel->userconnexion($_POST['mail'], $_POST['pwd'])){
                $this->redirect("/todo/liste");
            }
        }
        else{
            $error = true;
        }

        $this->header();
        include("views/user/userConnexion.php");
        $this->footer();
    }
}