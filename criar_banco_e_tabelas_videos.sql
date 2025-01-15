-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS u845457687_net_you_stream;
USE u845457687_net_you_stream;

-- Tabela de vídeos
CREATE TABLE IF NOT EXISTS videos (
    video_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,               -- Título do vídeo
    description TEXT,                           -- Descrição do vídeo
    channel_name VARCHAR(255) NOT NULL,         -- Nome do canal
    channel_image VARCHAR(255),                 -- URL da imagem do canal
    subscribers INT DEFAULT 0,                  -- Número de inscritos no canal
    views INT DEFAULT 0,                        -- Número de visualizações
    comments INT DEFAULT 0,                     -- Número de comentários
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP, -- Data de publicação
    age_rating VARCHAR(10),                     -- Classificação etária
    duration TIME,                              -- Duração do vídeo
    video_url VARCHAR(255) NOT NULL,            -- URL do vídeo (link do YouTube ou do servidor)
    likes INT DEFAULT 0,                        -- Número de likes
    dislikes INT DEFAULT 0,                     -- Número de dislikes
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação do registro
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Data de atualização
);

-- Tabela de comentários
CREATE TABLE IF NOT EXISTS comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    user_name VARCHAR(255),                     -- Nome do usuário que comentou
    comment_text TEXT,                          -- Texto do comentário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data do comentário
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
);

-- Tabela de reações aos vídeos
CREATE TABLE IF NOT EXISTS reactions (
    reaction_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    user_ip VARCHAR(50),                        -- IP do usuário
    reaction_type ENUM('like', 'dislike', 'love', 'hate') NOT NULL, -- Tipo de reação
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da reação
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
);

-- Tabela de estatísticas de vídeos (visualizações, likes, etc.)
CREATE TABLE IF NOT EXISTS video_stats (
    stat_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    views INT DEFAULT 0,                        -- Número de visualizações
    likes INT DEFAULT 0,                        -- Número de likes
    dislikes INT DEFAULT 0,                     -- Número de dislikes
    comments INT DEFAULT 0,                     -- Número de comentários
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Data de atualização
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
);

-- Tabela de categorias de vídeos
CREATE TABLE IF NOT EXISTS video_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    category_name VARCHAR(255) NOT NULL,         -- Nome da categoria (ex: Música, Esporte, etc.)
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
);

-- Tabela de vídeos favoritos (usuários podem marcar vídeos como favoritos)
CREATE TABLE IF NOT EXISTS video_favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,                       -- ID do usuário
    video_id INT NOT NULL,                      -- ID do vídeo
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de adição aos favoritos
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
);