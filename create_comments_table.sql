-- Tabela para armazenar os comentários
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                          -- ID do vídeo ao qual o comentário pertence
    author VARCHAR(255) NOT NULL,                   -- Autor do comentário
    text TEXT NOT NULL,                             -- Conteúdo do comentário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação do comentário
    parent_comment_id INT,                          -- ID do comentário ao qual esta resposta pertence, NULL se for um comentário principal
    likes INT DEFAULT 0,                            -- Número de curtidas no comentário
    deleted BOOLEAN DEFAULT FALSE,                  -- Indica se o comentário foi apagado (para poder ocultá-lo)
    FOREIGN KEY (parent_comment_id) REFERENCES comments(id) ON DELETE CASCADE -- Relacionamento para comentários e respostas
);

-- Tabela para registrar curtidas em comentários
CREATE TABLE comment_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT NOT NULL,                        -- ID do comentário curtido
    user_id INT NOT NULL,                           -- ID do usuário que curtiu o comentário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data e hora da curtida
    FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE
);

-- Tabela para armazenar informações dos usuários
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    avatar_url VARCHAR(255)                         -- URL do avatar do usuário
);