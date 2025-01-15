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

// SQL para criar a tabela 'notificacoes'
$sql = "CREATE TABLE IF NOT EXISTS notificacoes (
    id_notificacao INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    tipo VARCHAR(50),
    mensagem TEXT,
    data_notificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lida BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
)";

// Executar a query para criar a tabela
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'notificacoes' criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>