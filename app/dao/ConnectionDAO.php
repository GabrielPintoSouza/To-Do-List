<?php
    require_once dirname(__FILE__, 3) .DIRECTORY_SEPARATOR . 'config.php';
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