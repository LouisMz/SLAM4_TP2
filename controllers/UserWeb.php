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

    function connexion(){
        $this->header();
        include("views/user/userConnexion.php");
        $this->footer();
    }
}