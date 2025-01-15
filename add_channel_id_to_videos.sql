-- SQL para adicionar a coluna 'channel_id' à tabela 'videos'
ALTER TABLE videos
ADD COLUMN channel_id INT NOT NULL;

-- Atualizar 'channel_id' para referenciar a tabela de canais, caso exista
ALTER TABLE videos
ADD CONSTRAINT fk_channel_id FOREIGN KEY (channel_id) REFERENCES canais(user_id) ON DELETE CASCADE;