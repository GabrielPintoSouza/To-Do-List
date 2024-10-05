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

    public function autenticar(){
        //Implementar funcionalidade de autenticação no sistema

        //extrair dados da requisição
        $email = trim(filter_input(INPUT_POST, 'email'));
        $senha = trim(filter_input(INPUT_POST, 'password'));

        if(!$email || empty($email)){
            http_response_code(400);
            //adicionar mensagem de feedback posteriormente
            exit();
        }

        //Fazer busca do usuário por email
        try{
            $usuarioDao = new UsuarioDAO(ConexaoDAO::conectar());
            $usuario = $usuarioDao->getUserByEmail($email);

            print_r($usuario);
        }catch(PDOException $e){
            //Implementar tratamento de erro posteriormente
            echo 'Erro: '.$e->getMessage();
        }
        //comparar as senhas

        //atribuir id do usuário na session
        echo 'Entrou';
    }
}
