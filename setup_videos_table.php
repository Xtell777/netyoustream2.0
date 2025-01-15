<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";  // Nome do usuário do banco de dados
$password = "Tubarao777";            // Senha do banco de dados
$dbname = "u845457687_net_you_stream"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// SQL para criar a tabela 'videos'
$sql = "
USE u845457687_net_you_stream;

CREATE TABLE IF NOT EXISTS videos (
    video_id VARCHAR(20) PRIMARY KEY,       -- ID único do vídeo
    title VARCHAR(255) NOT NULL,             -- Título do vídeo
    subscribers INT DEFAULT 0,               -- Número de inscritos
    views INT DEFAULT 0,                     -- Número de visualizações
    comments INT DEFAULT 0,                  -- Número de comentários
    publish_date DATE,                       -- Data de publicação
    age_rating VARCHAR(10),                  -- Classificação etária
    duration TIME,                           -- Duração do vídeo
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Data da última atualização
)";

// Executando a consulta
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'videos' criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>