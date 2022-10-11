<?php

namespace Model;

class User
{
    private $email;
    private $password;

    public function __construct($email , $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public function GetEmail()
    {
        return $this->email;
    }

    public function SetEmail($email)
    {
        $this->email = $email;
    }

    public function GetPassword()
    {
        return $this->password;
    }


    public function SetPassword($password)
    {
        $this->password = $password;
    }
}

?>