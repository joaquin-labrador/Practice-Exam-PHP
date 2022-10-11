<?php

namespace Controllers;

use Utils\Session as Session;

class HomeController
{
    public function Index()
    {
        Session::VerifyIsLogged();
        require_once(VIEWS_PATH . "index.php");

    
    }
}
