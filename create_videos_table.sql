CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- ID único para cada vídeo
    usuario_id INT,                         -- ID do usuário que enviou o vídeo
    video_nome VARCHAR(255),                 -- Nome do vídeo
    video_path VARCHAR(255),                 -- Caminho do arquivo de vídeo
    titulo VARCHAR(255),                     -- Título do vídeo
    descricao TEXT,                          -- Descrição do vídeo
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data e hora do upload
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE  -- Relacionamento com a tabela de usuários
);