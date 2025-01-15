-- Criando o banco de dados
CREATE DATABASE IF NOT EXISTS streaming_db;
USE streaming_db;

-- Tabela de Canais
CREATE TABLE channels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    image_url VARCHAR(255),
    subscribers INT DEFAULT 0
);

-- Tabela de Vídeos
CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    channel_id INT,
    title VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    embed_url VARCHAR(255) NOT NULL,
    category VARCHAR(50),
    age_rating VARCHAR(10),
    duration TIME,
    publish_date DATE,
    views INT DEFAULT 0,
    comments INT DEFAULT 0,
    FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE
);

-- Inserindo um exemplo de canal
INSERT INTO channels (name, image_url, subscribers)
VALUES ('XTELL 777', 'https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a', 1200000);

-- Inserindo exemplos de vídeos com links para os vídeos
INSERT INTO videos (channel_id, title, url, embed_url, category, age_rating, duration, publish_date, views, comments)
VALUES 
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/gang-de-ponte-official-audio" target="_blank">GANG DE PONTE (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/gang-de-ponte-official-audio', 'https://www.youtube.com/embed/atLVRfmh9Ps', 'Música', '🔞+', '00:01:37', CURDATE() - INTERVAL 1 DAY, 1234567, 123),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/luxo-e-visao-2-official-audio" target="_blank">LUXO E VISÃO 2 (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/luxo-e-visao-2-official-audio', 'https://www.youtube.com/embed/-PrAH0-cbQY', 'Música', '🔞+', '00:01:41', CURDATE() - INTERVAL 2 DAY, 2345678, 234),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/na-mira-do-crime-official-audio" target="_blank">NA MIRA DO CRIME (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/na-mira-do-crime-official-audio', 'https://www.youtube.com/embed/qPuQ7_rv1xE', 'Música', '🔞+', '00:03:03', CURDATE() - INTERVAL 3 DAY, 3456789, 345),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/favela-de-ponte-official-audio" target="_blank">FAVELA DE PONTE (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/favela-de-ponte-official-audio', 'https://www.youtube.com/embed/XJwfIT8b_5Q', 'Música', '🔞+', '00:02:40', CURDATE() - INTERVAL 4 DAY, 4567890, 456),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/o-rei-do-estado-official-audio" target="_blank">O REI DO ESTADO (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/o-rei-do-estado-official-audio', 'https://www.youtube.com/embed/IyHusTrbgqM', 'Música', '🔞+', '00:02:27', CURDATE() - INTERVAL 5 DAY, 5678901, 567),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/ak-do-sport-official-audio" target="_blank">AK DO SPORT (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/ak-do-sport-official-audio', 'https://www.youtube.com/embed/Y8C94myqaS0', 'Música', '🔞+', '00:02:58', CURDATE() - INTERVAL 6 DAY, 6789012, 678),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/mente-de-gangster-official-audio" target="_blank">MENTE DE GANGSTER (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/mente-de-gangster-official-audio', 'https://www.youtube.com/embed/5pk2TxN6X8E', 'Música', '🔞+', '00:02:02', CURDATE() - INTERVAL 7 DAY, 7890123, 789),
(1, 'XTELL 777 - <a href="http://www.netyoustream.com/xtell-777/mundo-a-girar-official-audio" target="_blank">MUNDO A GIRAR (Official Áudio)</a>', 'http://www.netyoustream.com/xtell-777/mundo-a-girar-official-audio', 'https://www.youtube.com/embed/AnY_VqxTTJI', 'Música', '🔞+', '00:04:00', CURDATE() - INTERVAL 8 DAY, 8901234, 890);