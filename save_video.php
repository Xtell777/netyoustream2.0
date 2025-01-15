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
$video_id = $_POST['video_id'];
$user_id = $_POST['user_id'];
$title = $_POST['title'];
$category = $_POST['category'];
$age_rating = $_POST['age_rating'];
$views = $_POST['views'];
$subscribers = $_POST['subscribers'];
$publish_date = $_POST['publish_date'];
$comments = $_POST['comments'];

// Inserir ou atualizar dados do vídeo no banco de dados
$sql = "INSERT INTO videos (video_id, user_id, title, category, age_rating, views, subscribers, publish_date, comments)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
        title = VALUES(title), 
        category = VALUES(category), 
        age_rating = VALUES(age_rating), 
        views = VALUES(views), 
        subscribers = VALUES(subscribers), 
        publish_date = VALUES(publish_date), 
        comments = VALUES(comments)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisssiisi", $video_id, $user_id, $title, $category, $age_rating, $views, $subscribers, $publish_date, $comments);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Dados do vídeo salvos com sucesso']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar dados do vídeo']);
}

// Fechar conexão
$stmt->close();
$conn->close();
?>