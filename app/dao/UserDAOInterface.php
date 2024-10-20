<?php
require_once '../model/User.php';

interface UserDAOInterface{
    public function register(User $user);
    public function getUserByEmail(string $email):User|null;
}