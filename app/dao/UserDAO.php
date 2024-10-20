<?php
//Arquivos necessários
require_once '../model/User.php';
require_once '../dao/UserDAOInterface.php';

class UserDAO implements UserDAOInterface
{
    //Atributos
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Recebe como parâmetros um objeto do tipo Usuario e o registra no banco de dados da aplicação
     */
    public function register(User $user)
    {
        $insertUser = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

        $ps = $this->pdo->prepare($insertUser);
        $ps->bindValue(':name', $user->getName());
        $ps->bindValue(':email', $user->getEmail());
        $ps->bindValue(':password', $user->getPassword());
        $ps->execute();
    }

    /**
     * Returns a user with the same email as the parameter
     */
    public function getUserByEmail(string $email):User | null
    {
        $getUser = 'SELECT * FROM users WHERE email=:email';

        $ps = $this->pdo->prepare($getUser);
        $ps->bindParam(':email', $email);
        $ps->execute();

        if ($ps->rowCount() === 0) {
            return null;
        }

        $data = $ps->fetch(PDO::FETCH_ASSOC);

        $user = new User($data['name'], $data['email'], $data['password']);
        $user->setId($data['id']);

        return $user;
    }
}
