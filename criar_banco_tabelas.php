<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777"; // Substitua pelo seu usuário do banco
$password = "Tubarao777"; // Substitua pela sua senha
$dbname = "u845457687_net_you_stream"; // Substitua pelo nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criando o banco de dados, se não existir
$sql = "CREATE DATABASE IF NOT EXISTS u845457687_net_you_stream";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado ou já existe com sucesso.\n";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Selecionando o banco de dados
$conn->select_db($dbname);

// Criação das tabelas

// Tabela de vídeos
$sql_videos = "
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
)";

if ($conn->query($sql_videos) === TRUE) {
    echo "Tabela 'videos' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'videos': " . $conn->error;
}

// Tabela de comentários
$sql_comments = "
CREATE TABLE IF NOT EXISTS comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    user_name VARCHAR(255),                     -- Nome do usuário que comentou
    comment_text TEXT,                          -- Texto do comentário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data do comentário
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
)";

if ($conn->query($sql_comments) === TRUE) {
    echo "Tabela 'comments' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'comments': " . $conn->error;
}

// Tabela de reações aos vídeos
$sql_reactions = "
CREATE TABLE IF NOT EXISTS reactions (
    reaction_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    user_ip VARCHAR(50),                        -- IP do usuário
    reaction_type ENUM('like', 'dislike', 'love', 'hate') NOT NULL, -- Tipo de reação
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da reação
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
)";

if ($conn->query($sql_reactions) === TRUE) {
    echo "Tabela 'reactions' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'reactions': " . $conn->error;
}

// Tabela de estatísticas de vídeos
$sql_video_stats = "
CREATE TABLE IF NOT EXISTS video_stats (
    stat_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    views INT DEFAULT 0,                        -- Número de visualizações
    likes INT DEFAULT 0,                        -- Número de likes
    dislikes INT DEFAULT 0,                     -- Número de dislikes
    comments INT DEFAULT 0,                     -- Número de comentários
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Data de atualização
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
)";

if ($conn->query($sql_video_stats) === TRUE) {
    echo "Tabela 'video_stats' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'video_stats': " . $conn->error;
}

// Tabela de categorias de vídeos
$sql_video_categories = "
CREATE TABLE IF NOT EXISTS video_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    video_id INT NOT NULL,                      -- ID do vídeo
    category_name VARCHAR(255) NOT NULL,         -- Nome da categoria (ex: Música, Esporte, etc.)
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
)";

if ($conn->query($sql_video_categories) === TRUE) {
    echo "Tabela 'video_categories' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'video_categories': " . $conn->error;
}

// Tabela de vídeos favoritos
$sql_video_favorites = "
CREATE TABLE IF NOT EXISTS video_favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,                       -- ID do usuário
    video_id INT NOT NULL,                      -- ID do vídeo
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de adição aos favoritos
    FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE -- Relacionamento com a tabela de vídeos
)";

if ($conn->query($sql_video_favorites) === TRUE) {
    echo "Tabela 'video_favorites' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'video_favorites': " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>