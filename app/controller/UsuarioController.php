<?php
require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';
require_once '../dao/ConexaoDAO.php';
require_once '../helper/Message.php';
require_once '../dao/UsuarioDAOInterface.php';
class UsuarioController
{
    private $messageObject;
    private $usuarioDao;

    public function __construct(UsuarioDAOInterface $usuarioDao)
    {
        $this->messageObject = new Message();
        $this->usuarioDao = $usuarioDao;
    }
    /**
     * Recebe como parâmetros nome, email e senha, e realiza os procedimentos para registrar um usuário
     */
    public function registrar(): void
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario($nome, $email, Usuario::passwordHash($senha));

        try {
            $this->usuarioDao->registrar($usuario);

            session_start();
            $this->messageObject->setMessage('Usuário cadastrado com sucesso');
        } catch (PDOException $e) {
            //Implementar tratamento de erro posteriormente
            echo 'Erro: '.$e->getMessage();
        }
    }

    public function autenticar(){
        //Implementar funcionalidade de autenticação no sistema
        session_start();
        //extrair dados da requisição
        $email = trim(filter_input(INPUT_POST, 'email'));
        $senha = trim(filter_input(INPUT_POST, 'password'));

        if(!$email || empty($email)){
            http_response_code(400);
            $this->messageObject->setMessage('Um e-mail deve ser fornecido.');
            exit();
        }

        //Fazer busca do usuário por email
        try{
            $usuario = $this->usuarioDao->getUserByEmail($email);

            if(is_null($usuario)){
                $this->messageObject->setMessage('E-mail não cadastrado no sistema.');
                exit();
            }

            //comparar as senhas
            if(password_verify($senha, $usuario->getSenha())){
                $_SESSION['userId'] = $usuario->getId();
                $this->messageObject->setMessage("Bem vindo(a) {$usuario->getNome()}");
                //redirecionar para a página de dashboard posteriormente
            }else{
                $this->messageObject->setMessage('A combinação de e-mail e senha fornecida não é válida.');
                //redirecionar para a página de login posteriormente
            }
        }catch(PDOException $e){
            //Implementar tratamento de erro posteriormente
            echo 'Erro: '.$e->getMessage();
        }
    }
}
