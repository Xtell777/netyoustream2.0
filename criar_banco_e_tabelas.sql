-- Criação das tabelas
CREATE DATABASE net_you_stream;
USE net_you_stream;

-- Tabela de usuários
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de vídeos
CREATE TABLE videos (
    id_video INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    url_video VARCHAR(255) NOT NULL,
    categoria VARCHAR(100),
    duracao TIME,
    classificacao VARCHAR(10),
    usuario_id INT,
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    visualizacoes INT DEFAULT 0,
    comentarios INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

-- Tabela de comentários
CREATE TABLE comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    comentario_texto TEXT,
    usuario_id INT,
    video_id INT,
    data_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (video_id) REFERENCES videos(id_video)
);

-- Tabela de inscrições
CREATE TABLE inscricoes (
    id_inscricao INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    canal_id INT,
    data_inscricao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (canal_id) REFERENCES usuarios(id_usuario)
);

-- Tabela de notificações
CREATE TABLE notificacoes (
    id_notificacao INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    tipo VARCHAR(50),
    mensagem TEXT,
    data_notificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lida BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);