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

// Recuperando o channel_id do HTML
$channel_id = $_POST['channel_id'];  // Obtendo o ID do canal (em uma requisição POST)

// SQL para inserir um vídeo com o channel_id
$sql = "INSERT INTO videos (video_id, title, subscribers, views, comments, publish_date, age_rating, duration, channel_id) 
        VALUES ('VID001', 'Título do vídeo', 1200000, 1000, 10, CURDATE(), '🔞+', '00:03:00', ?)";

// Preparando a consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $channel_id);  // Vinculando o parâmetro do channel_id

// Executando a consulta
if ($stmt->execute()) {
    echo "Vídeo inserido com sucesso!";
} else {
    echo "Erro ao inserir o vídeo: " . $stmt->error;
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>