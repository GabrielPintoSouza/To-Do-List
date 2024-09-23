<?php
    //Arquivos necessários
    require_once '../model/Usuario.php';
    class UsuarioDAO{
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
    }
?>