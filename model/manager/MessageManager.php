<?php

namespace Model\Manager;

use App\AbstractManager;

class MessageManager extends AbstractManager
{
    private static $classname = "Model\Entity\Message";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *
                    FROM msg
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
    public function findOneBy($id)
    {
        $sql = "SELECT * 
                        FROM  msg
                        WHERE sujetId = :id";

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
                        FROM  msg
                        WHERE id = :id";

        return self::getResults(
            self::select(
                $sql,
                [":id" => $id]
            ),
            self::$classname
        );
    }

    public function createMessage($params)
    {

        $sql = "INSERT INTO msg (corpMessage, sujetId, userId)
                        VALUES (:corpMessage, :sujetId, :userId)";

        return self::create($sql, [
            "corpMessage" => $params['corpMessage'],
            "sujetId" => $params['sujetId'],
            "userId" => $params['userId']
        ]);
    }
    public function deleteMessage($id)
    {
        $sql = "DELETE FROM msg 
                    WHERE id = :id";

        return self::delete($sql, [":id" => $id]);
    }
    public function modifMessage($params)
    {

        $sql = " UPDATE msg
        SET corpMessage = :newMessage
        WHERE id = :id";

        return self::update($sql, [
            "newMessage" => $params['newMessage'],
            "id" => $params['id']
        ]);
    }
    public function countMessageBySujet($sujet)
    {

        $sql = "SELECT  COUNT(*) as countMessage
                FROM msg
                WHERE sujetId = :sujet
                GROUP BY sujetId";

        return self::select(
            $sql,
            [":sujet" => $sujet]
        );
    }
    public function countMessageBySujetLimit()
    {

        $sql = "SELECT  COUNT(*) as countMessage , sujetId
                FROM msg
                WHERE sujetId 
                GROUP BY sujetId
                ORDER BY  COUNT(*) DESC
                LIMIT 3 ";

        return self::select(
            $sql
        );
    }
    public function countMessage()
    {

        $sql = "SELECT  COUNT(*) as countMessage 
                FROM msg";

        return self::select(
            $sql
        );
    }
    public function lastestMessages()
    {

        $sql = "SELECT * 
            FROM msg 
            ORDER BY dateMessage DESC
            LIMIT 2  ";

        return self::getResults(
            self::select(
                $sql
            ),
            self::$classname
        );
    }
}
