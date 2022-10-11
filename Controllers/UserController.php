<?php

namespace Controllers;

use Model\User as User;
use Utils\Session as Session;

class UserController
{
    private $user;

    public function Login($email, $password)
    {

        if ($email === 'user@myapp.com'  && $password === '123456') {
            $this->user = new User($email, $password);
            Session::CreateSession($this->user);
            header("Location: " . FRONT_ROOT . "Invoice/ListForm");
        } else {
            $_SESSION["error"] = "Contraseña o email incorrectos";
            header("Location: " . FRONT_ROOT . "Home/Index");
        }
    }

    public function Logout()
    {
        Session::VerifySession();
        Session::DeleteSession();
        header("Location: ". FRONT_ROOT . "Home/Index");
    }
}

?>