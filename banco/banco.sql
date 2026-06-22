CREATE DATABASE sistema_aluguel;

USE sistema_aluguel;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255)
);

CREATE TABLE itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    valor_diaria DECIMAL(10,2),
    disponivel BOOLEAN DEFAULT TRUE
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    item_id INT,
    data_inicio DATE,
    data_fim DATE,
    valor_total DECIMAL(10,2),
    status VARCHAR(20) DEFAULT 'ATIVA',

    FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY(item_id) REFERENCES itens(id)
);