<?php
require_once '../model/User.php';
require_once '../dao/UserDAO.php';
require_once '../dao/ConnectionDAO.php';
require_once '../helper/Message.php';
require_once '../helper/Session.php';
require_once '../dao/UserDAOInterface.php';
class UserController
{
    private $messageObject;
    private $sessionObject;
    private $userDAO;

    public function __construct(UserDAOInterface $userDAO)
    {
        $this->messageObject = new Message();
        $this->sessionObject = new Session();
        $this->userDAO = $userDAO;
    }
    /**
     * Receives name, email and password as parameters, and carries out the procedures to register a user
     */
    public function register(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User($name, $email, User::passwordHash($password));

        try {
            $this->userDAO->register($user);

            $this->messageObject->setMessage('Usuário cadastrado com sucesso');
        } catch (PDOException $e) {
            //Implement error handling later
            echo 'Erro: '.$e->getMessage();
        }
    }

    public function auth(){
       //Implement authentication functionality in the system

        //extract data from the request
        $email = trim(filter_input(INPUT_POST, 'email'));
        $password = trim(filter_input(INPUT_POST, 'password'));

        if(!$email || empty($email)){
            http_response_code(400);
            $this->messageObject->setMessage('Um e-mail deve ser fornecido.');
            exit();
        }

        //Search the user by email
        try{
            $user = $this->userDAO->getUserByEmail($email);

            if(is_null($user)){
                $this->messageObject->setMessage('E-mail não cadastrado no sistema.');
                exit();
            }

            //compare passwords
            if(password_verify($password, $user->getPassword())){
                $this->sessionObject->setUserId($user->getId());
                $this->messageObject->setMessage("Bem vindo(a) {$user->getName()}");
                //redirect to the dashboard page later
            }else{
                $this->messageObject->setMessage('A combinação de e-mail e senha fornecida não é válida.');
                //redirect to the login page later
            }
        }catch(PDOException $e){
            //Implement error handling later
            echo 'Erro: '.$e->getMessage();
        }
    }
}
