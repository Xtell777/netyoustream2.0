<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Receber o video_id via GET
$video_id = $_GET['video_id'];

// Buscar informações do vídeo no banco de dados
$sql = "SELECT title, category, age_rating, views, subscribers, publish_date, comments FROM videos WHERE video_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $video_id);
$stmt->execute();

$result = $stmt->get_result();
$video_data = $result->fetch_assoc();

// Retornar dados do vídeo em JSON
if ($video_data) {
    echo json_encode($video_data);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Vídeo não encontrado']);
}

// Fechar conexão
$stmt->close();
$conn->close();
?>