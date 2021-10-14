<?php

namespace routes;

use controllers\Account;
use controllers\SampleWeb;
use controllers\VideoWeb;
use controllers\TodoWeb;
use controllers\UserWeb;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
        $todo = new TodoWeb();
        $user = new UserWeb();

        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);

        Route::Add('/user/connexion', [$user, 'connexion']);
        Route::Add('/user/register', [$user, 'register']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/todo/liste', [$todo, 'liste']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer', [$todo, 'supprimer']);
        }


        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

