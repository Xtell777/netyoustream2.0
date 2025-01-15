<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// SQL para adicionar a coluna 'channel_id' à tabela 'videos'
$sql = "
ALTER TABLE videos
ADD COLUMN channel_id INT NOT NULL;

ALTER TABLE videos
ADD CONSTRAINT fk_channel_id FOREIGN KEY (channel_id) REFERENCES canais(user_id) ON DELETE CASCADE;
";

// Executando a consulta
if ($conn->query($sql) === TRUE) {
    echo "Coluna 'channel_id' adicionada com sucesso!";
} else {
    echo "Erro ao adicionar coluna: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>