-- Conexão com o banco de dados
USE u845457687_net_you_stream;

-- Adiciona a coluna 'channel_id' à tabela 'videos'
ALTER TABLE videos 
ADD COLUMN IF NOT EXISTS channel_id INT;

-- Definindo a chave estrangeira (foreign key) para relacionar com a tabela 'channels'
ALTER TABLE videos
ADD CONSTRAINT fk_channel_id FOREIGN KEY (channel_id) REFERENCES canais(user_id) ON DELETE CASCADE;