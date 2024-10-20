-- Criação do banco de dados
CREATE DATABASE tododb;
USE tododb;

-- Criação da tabela de usuários
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);