<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Erro de conexão com o banco de dados"]);
    exit();
}

// Obtém os dados do JSON enviado
$data = json_decode(file_get_contents('php://input'), true);
$author = $data['author'];
$text = $data['text'];

$stmt = $conn->prepare("INSERT INTO comments (author, text) VALUES (?, ?)");
$stmt->bind_param("ss", $author, $text);

if ($stmt->execute()) {
    // Retorna o novo comentário com ID gerado para exibição no frontend
    echo json_encode(["id" => $stmt->insert_id, "author" => $author, "text" => $text]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Erro ao salvar comentário"]);
}

$stmt->close();
$conn->close();
?>