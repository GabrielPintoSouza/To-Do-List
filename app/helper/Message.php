<?php
class Message{
    public function setMessage($message){
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