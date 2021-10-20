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

    function register()
    {
        $error = 1;
        if (isset($_POST['name']) && isset($_POST['pwd'])){
            if ($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 1) {
                $this->redirect("me");
            }
            elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 0){
                $error = 0;
            }
            elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 2){
                $error = 2;
            }               
             elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 4){
                $error = 4;
            }
            
        }


        $this->header();
        include("views/user/UserRegister.php");
        $this->footer();

    }
}