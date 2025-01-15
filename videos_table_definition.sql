CREATE TABLE videos (
    id INT PRIMARY KEY AUTO_INCREMENT,        -- ID único para cada entrada de vídeo
    video_id VARCHAR(50) NOT NULL UNIQUE,    -- ID do vídeo no sistema (deve ser único)
    title VARCHAR(255) NOT NULL,              -- Título do vídeo
    subscribers INT DEFAULT 0,                -- Número de inscritos do canal que publicou o vídeo
    views INT DEFAULT 0,                       -- Número de visualizações do vídeo
    comments INT DEFAULT 0,                    -- Número de comentários no vídeo
    publish_date DATE,                         -- Data de publicação do vídeo
    age_rating VARCHAR(10),                    -- Classificação etária do vídeo
    duration TIME,                             -- Duração do vídeo
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Data da última atualização
);