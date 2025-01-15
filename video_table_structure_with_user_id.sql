-- Criação ou modificação da tabela de vídeos
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- ID único para cada vídeo
    video_id VARCHAR(50) NOT NULL UNIQUE,     -- ID do vídeo no sistema (deve ser único)
    title VARCHAR(255) NOT NULL,              -- Título do vídeo
    category VARCHAR(100),                    -- Categoria do vídeo
    age_rating VARCHAR(10),                   -- Classificação etária
    duration TIME,                            -- Duração do vídeo
    publish_date DATE,                        -- Data de publicação
    views INT DEFAULT 0,                      -- Número de visualizações do vídeo
    subscribers INT DEFAULT 0,                -- Número de inscritos do canal
    comments INT DEFAULT 0,                   -- Número de comentários
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  -- Data da última atualização
    channel_id INT,                           -- ID do canal associado ao vídeo
    user_id INT,                              -- ID do usuário associado ao vídeo
    FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE, -- Relacionamento com canais
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE         -- Relacionamento com usuários
);