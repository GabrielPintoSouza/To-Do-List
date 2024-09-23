<?php
require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';
require_once '../dao/ConexaoDAO.php';
class UsuarioController
{
    /**
     * Recebe como parâmetros nome, email e senha, e realiza os procedimentos para registrar um usuário
     */
    public function registrar(): void
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario($nome, $email, $senha);

        try {
            $usuarioDao = new UsuarioDAO(ConexaoDAO::conectar());
            $usuarioDao->registrar($usuario);
        } catch (PDOException $e) {
            //Implementar tratamento de erro posteriormente
            echo 'Erro: '.$e->getMessage();
        }
    }
}
