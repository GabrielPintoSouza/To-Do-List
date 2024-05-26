<?php
    //Arquivos necessários
    require_once 'ConexaoDAO.php';
    class UsuarioDAO{
        //Atributos
        private PDO $pdo;
        public function __construct()
        {
            $this->pdo = ConexaoDAO::conectar();
        }

        /**
         * Recebe como parâmetros o nome, o email e a senha de um usuário a ser registrado no sistema
         */
        public function registrar(string $nome, string $email, string $senha){
            try{
                $insertUsuario = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';

                $ps = $this->pdo->prepare($insertUsuario);
                $ps->bindParam(':nome', $nome);
                $ps->bindParam(':email', $email);
                $ps->bindParam(':senha', $senha);
                $ps->execute();
            }catch(PDOException $e){

            }
        }
    }
?>