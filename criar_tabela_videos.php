<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!<br>";
}

// SQL para criar a tabela 'videos'
$sql = "CREATE TABLE IF NOT EXISTS videos (
    id_video INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    url_video VARCHAR(255) NOT NULL,
    categoria VARCHAR(100),
    duracao TIME,
    classificacao VARCHAR(10),
    usuario_id INT,
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    visualizacoes INT DEFAULT 0,
    comentarios INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
)";

// Executar a query para criar a tabela
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'videos' criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>