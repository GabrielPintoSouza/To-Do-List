<?php
    require_once '../../config.php';
    class ConexaoDAO{
        public static function conectar(){
            try{
                $pdo = new PDO(DSN, USER, PASSWORD);
                return $pdo;
            }catch(PDOException $e){
                return null;
            } 
        }
    }
?>