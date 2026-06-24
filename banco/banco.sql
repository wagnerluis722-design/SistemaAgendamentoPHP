CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin','cliente') DEFAULT 'cliente',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT,
    endereco VARCHAR(200),
    valor DECIMAL(10,2),
    status ENUM('Disponível','Alugado') DEFAULT 'Disponível'
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    imovel_id INT,
    data_agendamento DATE,
    status ENUM('Pendente','Aprovado','Cancelado') DEFAULT 'Pendente',

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        ON DELETE CASCADE,

    FOREIGN KEY (imovel_id) REFERENCES imoveis(id)
        ON DELETE CASCADE
);