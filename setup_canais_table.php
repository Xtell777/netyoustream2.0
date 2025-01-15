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

// SQL para criar a tabela 'canais'
$sql = "
CREATE TABLE IF NOT EXISTS canais (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    inscritos INT DEFAULT 0,
    videos INT DEFAULT 0,
    visualizacoes INT DEFAULT 0,
    descricao TEXT,
    UNIQUE (nome) -- Garante que o nome do canal seja único
)";

// Executando a consulta
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'canais' criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>