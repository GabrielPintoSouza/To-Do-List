<?php
require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';
require_once '../dao/ConexaoDAO.php';
require_once '../helper/Message.php';
class UsuarioController
{
    private $messageObject;

    public function __construct()
    {
        $this->messageObject = new Message();
    }
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

            session_start();
            $this->messageObject->setMessage('Usuário cadastrado com sucesso');
        } catch (PDOException $e) {
            //Implementar tratamento de erro posteriormente
            echo 'Erro: '.$e->getMessage();
        }
    }
}
