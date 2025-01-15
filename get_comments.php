<?php
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Erro de conexão com o banco de dados"]);
    exit();
}

$result = $conn->query("SELECT id, author, text FROM comments ORDER BY id DESC");

$comments = [];
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);

$conn->close();
?>