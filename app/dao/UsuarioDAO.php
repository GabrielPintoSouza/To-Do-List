<?php
    //Arquivos necessários
    require_once '../model/Usuario.php';
    require_once '../dao/UsuarioDAOInterface.php';

    class UsuarioDAO implements UsuarioDAOInterface{
        //Atributos
        private PDO $pdo;
        
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        /**
         * Recebe como parâmetros um objeto do tipo Usuario e o registra no banco de dados da aplicação
         */
        public function registrar(Usuario $usuario){
                $insertUsuario = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';

                $ps = $this->pdo->prepare($insertUsuario);
                $ps->bindValue(':nome', $usuario->getNome());
                $ps->bindValue(':email', $usuario->getEmail());
                $ps->bindValue(':senha', $usuario->getSenha());
                $ps->execute();
        }

        /**
         * Returns a user with the same email as the parameter
         */
        public function getUserByEmail(string $email){
            $getUser = 'SELECT * FROM usuarios WHERE email=:email';

            $ps = $this->pdo->prepare($getUser);
            $ps->bindParam(':email', $email);
            $ps->execute();

            if($ps->rowCount() === 0){
                return null;
            }

            $data = $ps->fetch(PDO::FETCH_ASSOC);

            $user = new Usuario($data['nome'], $data['email'], $data['senha']);
            $user->setId($data['id']);

            return $user;
        }
    }
?>