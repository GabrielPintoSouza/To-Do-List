<?php
    require_once '../../config.php';
    class ConnectionDAO{
        public static function connect(){
            try{
                $pdo = new PDO(DSN, USER, PASSWORD);
                return $pdo;
            }catch(PDOException $e){
                return null;
            } 
        }
    }
?>