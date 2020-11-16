<?php

namespace App;

session_start();

abstract class Session
{
    //la méthode qui nous permet de récupérer le user en session
    public static function getUser()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] !== null) {
            return $_SESSION['user'];
        }
        return false;
    }

    public static function setUser($userName)
    {
        $_SESSION['user'] = $userName;
    }

    public static function removeUser()
    {
        if (self::getUser()) {
            session_unset();
        }
        return;
    }

    public static function authenticationRequired($roleToHave)
    {
        if (!self::getUser()) {
            Router::redirectTo("security", "login");
        }
    }

    public static function generateKey()
    {
        if (!isset($_SESSION['key']) || $_SESSION['key'] === null) {
            $_SESSION['key'] = bin2hex(random_bytes(32));
        }
    }

    public static function getKey()
    {
        return $_SESSION['key'];
    }

    public static function  changeMdp($oldMdp,  $hashOldMdp, $newMdp, $confirmMdp)
    {


        if (password_verify($oldMdp, $hashOldMdp)) {


            if (!password_verify($newMdp, $hashOldMdp)) {

                if ($newMdp === $confirmMdp) {

                    if (strlen($newMdp) >= 8) {

                        if (preg_match('/[@_!#$%^?&*\/+;\'\(.)<*>?\|}​​​​​​​​{​​​​​​​​~:]/', $newMdp)) {

                            $_SESSION['succes'] = "mot de passe changé  avec succes";
                            return $newMdp;
                        } else {
                            $_SESSION['password_erreur'] =  "ajouté au moins un caractère spécial";
                            return false;
                        }
                    } else {
                        $_SESSION['password_erreur'] = "mot de passe trop court";
                        return false;
                    }
                } else {
                    $_SESSION['password_erreur'] = " veuillez la comfirmation de mot de passe est  incorrect ";
                    return false;
                }
            } else {
                $_SESSION['password_erreur'] = " veuillez changer  de mot de passe ";
                return false;
            }
        } else {
            $_SESSION['password_erreur'] =  " le mot de passe    ne corespond pas  à l'ancien mot de passe";
            return false;
        }
    }
}

    //security&method=searchTopic