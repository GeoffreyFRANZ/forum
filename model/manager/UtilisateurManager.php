<?php

namespace Model\Manager;

use App\AbstractManager;

class UtilisateurManager extends AbstractManager
{
    private static $classname = "Model\Entity\Utilisateur";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *
                    FROM utilisateur 
                    ";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function lastUser()
    {

        $sql = "SELECT *
                    FROM utilisateur 
                    ORDER BY inscription DESC
                    LIMIT 4
                    ";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function findOneById($id)
    {
        $sql  = "SELECT * 
                    FROM utilisateur 
                     WHERE id = :id";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                ["id" => $id],
                false
            ),
            self::$classname
        );
    }

    public function findBy($email)
    {
        $sql = "SELECT * 
                     FROM utilisateur
                     WHERE  email = :email OR pseudo = :email";

         
        return self::getResults(
            self::select(
                $sql,
            [':email' => $email]
            ), 
               self::$classname
        );
    }
    public function findByPseudo($pseudo)
    {
        $sql = "SELECT *
                     FROM utilisateur
                     WHERE  pseudo = :pseudo";

         
        return self::getOneOrNullResult(
            self::select(
                $sql,
            [':pseudo' => $pseudo],
            false
        ),
        self::$classname
    );
    }
    public function register($pseudo, $email, $mdp)
    {
        $sql = "INSERT INTO  utilisateur ( pseudo, email, mdp , avatar) 
                VALUES (:pseudo,  :email, :mdp , 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png')  ";

        return  self::create($sql, [
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':mdp' => $mdp]); 
            
self::$classname;
    }
    public function modifImgUser($id , $url){
   
        
            
        $sql = " UPDATE utilisateur
        SET avatar = :avatar
        WHERE id = :id";
  
        return self::update($sql,[
           "avatar" => $url ,
           "id" => $id,
          ]);
    }
    public function modifEmailUser($id , $mail){
   
        
            
        $sql = " UPDATE utilisateur
        SET email = :mail
        WHERE id = :id";
  
        return self::update($sql,[
           "mail" => $mail,
           "id" => $id,
          ]);
    }
    public function searchPseudo($search){
     
            $sql = "SELECT *
                      FROM Utilisateur
                      WHERE Pseudo Like '%$search%'";
    
            return self::getResults(
                self::select(
                    $sql,
                    null,
                    true
                ),
                self::$classname
            );
        }
        public function modifPseudo($id , $pseudo){
            $sql = " UPDATE utilisateur
            SET pseudo = :pseudo
            WHERE id = :id";
      
            return self::update($sql,[
               "pseudo" => $pseudo,
               "id" => $id,
              ]);
        }
    public function modifMdp($id, $mdp){
        $sql = " UPDATE utilisateur
        SET mdp = :mdp
        WHERE id = :id";
  
        return self::update($sql,[
           "mdp" => $mdp,
           "id" => $id,
          ]);
    }
    public function changeRole($id, $role){

        $sql = " UPDATE utilisateur
        SET rang = :rang
        WHERE id = :id";
  
        return self::update($sql,[
           "rang" => $role,
           "id" => $id,
          ]);

    }
    public function countUtilisateur()
    {

        $sql = "SELECT  COUNT(*) as countUtilisateur
                FROM utilisateur";

        return self::select(
            $sql
        );
    }

}
