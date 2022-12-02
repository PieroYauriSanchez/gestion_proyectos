<?php

class Database
{
    public function db_connect()
    {
        try{
            $db = new PDO(
                DB_TYPE.":Server=".DB_HOST.";database=".DB_NAME,
                DB_USER,
                DB_PASS
            );
            // $db = new PDO(
            //         DB_TYPE.":host=".DB_HOST."; dbname=".DB_NAME,
            //         DB_USER,
            //         DB_PASS
            //     );
           
            return  $db;
            show($db);

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}
