<?php
include 'db_config.php';
// O resto do código
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

// Receber o user_id via GET
$user_id = $_GET['user_id'];

// Buscar informações do canal no banco de dados
$sql = "SELECT name, description, image_url, subscribers, videos, views FROM channels WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$channel_data = $result->fetch_assoc();

// Retornar dados do canal em JSON
if ($channel_data) {
    echo json_encode($channel_data);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Canal não encontrado']);
}

// Fechar conexão
$stmt->close();
$conn->close();
?>