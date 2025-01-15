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

// Receber dados enviados via POST
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];
$subscribers = $_POST['subscribers'];
$videos = $_POST['videos'];
$views = $_POST['views'];

// Inserir ou atualizar dados do canal no banco de dados
$sql = "INSERT INTO channels (user_id, name, description, image_url, subscribers, videos, views)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
        name = VALUES(name), 
        description = VALUES(description), 
        image_url = VALUES(image_url), 
        subscribers = VALUES(subscribers), 
        videos = VALUES(videos), 
        views = VALUES(views)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssiii", $user_id, $name, $description, $image_url, $subscribers, $videos, $views);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Dados salvos com sucesso']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar dados']);
}

// Fechar conexão
$stmt->close();
$conn->close();
?>