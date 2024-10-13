<?php
require_once '../model/Usuario.php';

interface UsuarioDAOInterface{
    public function registrar(Usuario $usuario);
    public function getUserByEmail(string $email);
}