-- Criação do banco de dados
CREATE DATABASE tododb;
USE tododb;

-- Criação da tabela de usuários
CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(50)
);