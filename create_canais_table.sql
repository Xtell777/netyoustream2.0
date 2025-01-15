CREATE TABLE canais (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    inscritos INT DEFAULT 0,
    videos INT DEFAULT 0,
    visualizacoes INT DEFAULT 0,
    descricao TEXT
);