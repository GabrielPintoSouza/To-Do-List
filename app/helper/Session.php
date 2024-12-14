<?php

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setUserId(int $id)
    {
        if ($id < 1) {
            throw new InvalidArgumentException('O id de um usuário deve ser um inteiro positivo maior ou igual a 1.');
        }

        $_SESSION['userId'] = $id;
    }

    public function getUserId()
    {
        if (!isset($_SESSION['userId'])) {
            return null;
        }

        return $_SESSION['userId'];
    }

    public function setMessage(string $message){
        $_SESSION['message'] = $message;   
    }

    public function getMessage(){
        if(!isset($_SESSION['message'])){
            return null;
        }
        return $_SESSION['message'];
    }

    public function destroyMessage(){
        unset($_SESSION['message']);
    }
}
