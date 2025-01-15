-- Criação do banco de dados
CREATE DATABASE u845457687_net_you_stream;

-- Seleção do banco de dados
USE u845457687_net_you_stream;

-- Tabela de vídeos
CREATE TABLE videos (
    video_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    subscribers INT NOT NULL DEFAULT 0,
    views INT NOT NULL DEFAULT 0,
    comments INT NOT NULL DEFAULT 0,
    publish_date DATE NOT NULL,
    age_rating VARCHAR(10) NOT NULL,
    duration TIME NOT NULL,
    embed_url VARCHAR(255) NOT NULL,  -- URL do vídeo
    channel_name VARCHAR(100) NOT NULL,  -- Nome do canal
    channel_image VARCHAR(255) NOT NULL  -- URL da imagem do canal
);

-- Tabela de comentários
CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT,
    author_name VARCHAR(100) NOT NULL,
    comment_text TEXT NOT NULL,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    likes INT NOT NULL DEFAULT 0,
    FOREIGN KEY (video_id) REFERENCES videos(video_id)
);