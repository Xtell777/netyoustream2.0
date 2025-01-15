CREATE TABLE canais (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- ID único para cada canal
    usuario_id INT,                           -- ID do usuário único
    nome_canal VARCHAR(255) UNIQUE,          -- Nome do canal único
    descricao TEXT,                           -- Descrição do canal
    imagem_url VARCHAR(255),                  -- URL da imagem do canal
    inscritos INT DEFAULT 0,                  -- Contagem de inscritos no canal
    total_videos INT DEFAULT 0,               -- Total de vídeos carregados
    visualizacoes INT DEFAULT 0,              -- Total de visualizações do canal
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE -- Relacionado à tabela de usuários
);