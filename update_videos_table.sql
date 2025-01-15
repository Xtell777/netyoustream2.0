-- Verificar se a tabela 'videos' existe antes de tentar modificar
-- Adiciona novos campos ou modifica existentes sem recriar a tabela

-- Adicionar a coluna 'category' se não existir
ALTER TABLE videos 
ADD COLUMN IF NOT EXISTS category VARCHAR(100);

-- Adicionar a coluna 'age_rating' se não existir
ALTER TABLE videos 
ADD COLUMN IF NOT EXISTS age_rating VARCHAR(10);

-- Modificar a coluna 'views' para garantir que tenha um valor padrão de 0
ALTER TABLE videos
MODIFY COLUMN views INT DEFAULT 0;

-- Adicionar a coluna 'subscribers' se não existir
ALTER TABLE videos 
ADD COLUMN IF NOT EXISTS subscribers INT DEFAULT 0;

-- Adicionar a coluna 'publish_date' se não existir
ALTER TABLE videos
ADD COLUMN IF NOT EXISTS publish_date DATE;

-- Adicionar a coluna 'comments' se não existir
ALTER TABLE videos
ADD COLUMN IF NOT EXISTS comments INT DEFAULT 0;