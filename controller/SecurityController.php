<?php
namespace Controller;

use Model\manager\UtilisateurManager;
use App\Session;
use App\Router;

class SecurityController
{
    public function login(){
        $model = new UtilisateurManager();

        if(!empty($_POST)){
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");

            if($user = $model->findByPseudo($username)){
                if(password_verify($password, $user->getMdp())){
                    $_SESSION['user'] =  $user;

                    return Router::redirectTo("home", "index");

                }
                else var_dump("MAUVAIS MOT DE PASSE");
            }
            else var_dump("UTILISATEUR INCONNU");
        }

        return [
            "view" => "login.php",
            "data" => null
        ];
    }

    public function register(){

        if(!empty($_POST)){

            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $pass1 = filter_input(INPUT_POST, "pass1");
            $pass2 = filter_input(INPUT_POST, "pass2");


            if($username && $pass1 && $pass2 && $email){

                if($pass1 == $pass2){
                    $model = new UtilisateurManager();
                    if(!$model->findByPseudo($username)){
                        $hash = password_hash($pass1, PASSWORD_BCRYPT);
                        if($model->register($username, $email , $hash)){
                            Router::redirectTo("security", "register");
                        }
                    }
                    else $_SESSION["pseudo_ error"] = "USER DEJA EXISTANT";
                }
                else $_SESSION["password_erreur"] =  "MOTS DE PASSE DIFFERENTS";
            }
            else $_SESSION["erreur"] =  "CHAMPS MANQUANTS";
        }

        return [
            "view" => "subscrite.php",
            "data" => null
        ];
    }



    public function logout(){
        Session::removeUser();
        Router::redirectTo("home");
    }
}