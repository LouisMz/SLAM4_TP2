<?php

namespace controllers;

use controllers\base\Web;

class SampleWeb extends Web
{
    function home()
    {
        $this->header();
        include("views/global/home.php");
        $this->footer();
    }

    function about()
    {
        $this->header();
        include("views/global/about.php");
        $this->footer();
    }
}