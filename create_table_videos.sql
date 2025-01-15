CREATE TABLE videos (
    video_id VARCHAR(20) PRIMARY KEY,      -- ID único do vídeo
    title VARCHAR(255) NOT NULL,            -- Título do vídeo
    subscribers INT DEFAULT 0,               -- Número de inscritos
    views INT DEFAULT 0,                      -- Número de visualizações
    comments INT DEFAULT 0,                   -- Número de comentários
    publish_date DATE,                        -- Data de publicação
    age_rating VARCHAR(10),                   -- Classificação etária
    duration TIME,                            -- Duração do vídeo
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Data da última atualização
);