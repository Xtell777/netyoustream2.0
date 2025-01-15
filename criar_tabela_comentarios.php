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

// SQL para criar a tabela 'comentarios'
$sql = "CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    comentario_texto TEXT,
    usuario_id INT,
    video_id INT,
    data_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (video_id) REFERENCES videos(id_video)
)";

// Executar a query para criar a tabela
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'comentarios' criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>