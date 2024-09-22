<?php
require_once '../model/Usuario.php';
    class UsuarioController{
        /**
         * Recebe como parâmetros nome, email e senha, instancia um objeto do tipo Usuario chamando o seu respectivo método de registro
         */
        public function registrar():void{
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = new Usuario();

            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setSenha($senha);

            $usuario->registrar();
        }
    }
?>