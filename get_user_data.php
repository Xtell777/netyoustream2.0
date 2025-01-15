<?php
header('Content-Type: application/json');

// Configuração do banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=u845457687_net_you_stream', 'u845457687_XTELL_777', 'Tubarao777');

// Substitua pelo ID do usuário logado (use tokens ou sessões na prática)
$user_id = 1;

try {
    $stmt = $pdo->prepare("SELECT username, description FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode(['success' => true, 'username' => $user['username'], 'description' => $user['description']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
}
?>