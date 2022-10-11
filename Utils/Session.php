<?php
    namespace Utils;
    use Model\User as User;
    
    class Session {
        
        public static function CreateSession (User $user) {
            $_SESSION["loggedUser"] = $user;
        }

        public static function DeleteSession (){
            session_start();
            session_destroy();
        }

        public static function VerifySession(){
            //if the user not logged in the page, redirect to login
            if(!isset($_SESSION["loggedUser"])){
                header("Location: ". FRONT_ROOT . "Home/Index");
            }
        }

        public static function VerifyIsLogged() {
            if(isset($_SESSION["loggedUser"])){
                header("Location: ". FRONT_ROOT . "Invoice/ListForm");
            }
              
            
        }

    } 