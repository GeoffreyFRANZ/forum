<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class CategoryManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Category";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT *
                    FROM categorie c
                    ";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * 
                        FROM categorie
                        WHERE id = :id";


            return self:: getOneOrNullResult(
                self::select($sql, 
                    [":id" => $id], 
                    null, true
                ), 
                self::$classname
            );
        }

    }