-- Criando o banco de dados
CREATE DATABASE IF NOT EXISTS net_you_stream;

-- Selecionando o banco de dados
USE net_you_stream;

-- Criando a tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Criando a tabela de canais
CREATE TABLE IF NOT EXISTS channels (
    channel_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    subscribers INT DEFAULT 0,
    total_videos INT DEFAULT 0,
    views INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Criando a tabela de vídeos
CREATE TABLE IF NOT EXISTS videos (
    video_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    age_rating VARCHAR(10),
    views INT DEFAULT 0,
    subscribers INT DEFAULT 0,
    publish_date DATE,
    comments INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Inserindo dados de exemplo na tabela de usuários
INSERT INTO users (username, password, email) 
VALUES ('xtell777', 'senha_segura', 'xtell777@email.com');

-- Inserindo dados de exemplo na tabela de canais
INSERT INTO channels (user_id, name, description, image_url, subscribers, total_videos, views) 
VALUES (1, 'XTELL 777', 'Canal oficial de XTELL 777, músico inovador.', 'https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a', 1200000, 10, 5000000);

-- Inserindo dados de exemplo na tabela de vídeos
INSERT INTO videos (user_id, title, category, age_rating, views, subscribers, publish_date, comments) 
VALUES (1, 'XTELL 777 - GANG DE PONTE (Official Áudio)', 'Música', '🔞+', 1234567, 1200000, CURDATE() - INTERVAL 1 DAY, 123);