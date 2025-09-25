<?php
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'User.php';

interface UserDAOInterface{
    public function register(User $user);
    public function getUserByEmail(string $email):User|null;
}