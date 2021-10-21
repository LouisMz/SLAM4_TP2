<?php
namespace controllers;

use controllers\base\Web;
use models\UserModel;
use utils\SessionHelpers;

class UserWeb extends web
{
    private $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    function connexion()
    {
        $error = 0;
        if(isset($_POST['mail']) && isset($_POST['pwd'])){
            if($this->userModel->userconnexion($_POST['mail'], $_POST['pwd'])){
                $this->redirect("/todo/liste");
            }else{
                $error = 1;
            }
        }
       

        $this->header();
        include("views/user/userConnexion.php");
        $this->footer();
    }

    function register()
    {
        $error = 1;
        if (isset($_POST['name']) && isset($_POST['pwd'])){
            if ($this->userModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['pwdC'], $_POST['mail']) == 1) {
                $this->redirect("/todo/liste");
            }
            elseif($this->userModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['pwdC'], $_POST['mail']) == 0){
                $error = 0;
            }
            elseif($this->userModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['pwdC'], $_POST['mail']) == 2){
                $error = 2;
            }               
             elseif($this->userModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['pwdC'], $_POST['mail']) == 4){
                $error = 4;
            }
            
        }


        $this->header();
        include("views/user/UserRegister.php");
        $this->footer();

    }

    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("/user/connexion");
    }

    // Affiche l'utilisateur actuellement connecté.
    function me()
    {
        $account = 
        $this->header();
        include("views/user/me.php");
        $this->footer();
    }
}
