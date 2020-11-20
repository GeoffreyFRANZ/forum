<?php

namespace Model\Manager;

use App\AbstractManager;


class TopicManager extends AbstractManager
{
    private static $classname = "Model\Entity\Topic";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *
                    FROM topic
                    ORDER BY nomTopic DESC";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }
    public function findTopSujet()
    {

        $sql = "SELECT *
                    FROM topic
                    ORDER BY nomTopic DESC";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function findOneBy($id , $page)
    {
        $sql = "SELECT * 
                        FROM  topic
                        WHERE categorieId = :id 
                        LIMIT ".(($page-1)* 5)." , 5";
                        
        return self::getResults(
            self::select(
                $sql,
                [":id" => $id]
            ),
            self::$classname
        );
    }
    public function CountBy($id)
    {
        $sql = "SELECT COUNT(*) as   nbTopic
                        FROM  topic
                        WHERE categorieId = :id ";
                        
        return self::select(
                $sql,
                [":id" => $id]
            );
    }
    public function findOneByLimite($id)
    {
        $sql = "SELECT * 
                        FROM  topic
                        WHERE categorieId = :id
                        ORDER BY dateTopic DESC
                        LIMIT 2 ";

        return self::getResults(
            self::select(
                $sql,
                [":id" => $id]
            ),
            self::$classname
        );
    }
    public function findBy($id)
    {
        $sql = "SELECT * 
                        FROM  topic
                        WHERE id = :id";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                [":id" => $id], null , false
            ),
            self::$classname
        );
    }
    public function createTopic($params)
    {

        $sql = "INSERT INTO topic (nomTopic, corpSujet, userId, categorieId)
                    VALUES (:nomTopic, :corpSujet, :userId, :categorieId)";

        return self::create($sql, [
            "nomTopic" => $params['nomTopic'],
            "corpSujet" => $params['corpSujet'],
            "userId" => $params['userId'],
            "categorieId" => $params['categorieId']
        ]);
    }
    public function modifTopic($titre, $message, $categorie, $id)
    {



        $sql = " UPDATE topic
            SET nomTopic = :Topic,
                corpSujet = :corpText,
                categorieId = :categorieId
            WHERE id = :id";

        return self::update($sql, [
            "Topic" => $titre,
            "id" => $id,
            "corpText" => $message,
            "categorieId" => $categorie
        ]);
    }

    public function nomCatbysujet()
    {
        $sql = "SELECT c.id , nomCategorie
            FROM  categorie c
             INNER JOIN topic t
            ON t.categorieId = c.id ";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function findByName($search)
    {
        $sql = "SELECT *
                  FROM topic
                  WHERE nomTopic Like '%$search%'
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
    public function search($text){

        $sql = "SELECT * FROM topic WHERE corSuejt  LIKE '%$text%'  OR nomTopic like '%$text%'  ";


      return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );

    }
    public function countSujet()
    {

        $sql = "SELECT  COUNT(*) as countSujet
                FROM topic";

        return self::select(
            $sql
        );
    }
}
