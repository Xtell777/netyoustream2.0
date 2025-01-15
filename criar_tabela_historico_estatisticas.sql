CREATE TABLE historico_estatisticas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_id VARCHAR(255),
    channel_id INT,                            -- ID do canal associado ao vídeo
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    views INT,
    subscribers INT,
    comments INT,
    FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE -- Referência à tabela channels
);