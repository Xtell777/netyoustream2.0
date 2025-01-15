<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$host = "localhost";
$dbname = "u845457687_net_you_stream";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados foram enviados via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['channelName'] ?? '';
        $descricao = $_POST['channelDescription'] ?? '';
        $imagem = ''; // O caminho será processado abaixo
        $usuario_id = 1; // Aqui você pode ajustar para pegar o ID do usuário logado

        // Verifica se uma imagem foi enviada
        if (isset($_FILES['channelImage']) && $_FILES['channelImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $imageName = basename($_FILES['channelImage']['name']);
            $uploadFile = $uploadDir . $imageName;

            if (move_uploaded_file($_FILES['channelImage']['tmp_name'], $uploadFile)) {
                $imagem = $uploadFile;
            }
        }

        // Insere ou atualiza as informações do canal
        $stmt = $pdo->prepare("INSERT INTO canais (nome, descricao, imagem, usuario_id) 
                               VALUES (:nome, :descricao, :imagem, :usuario_id)
                               ON DUPLICATE KEY UPDATE 
                               nome = VALUES(nome), descricao = VALUES(descricao), imagem = VALUES(imagem)");
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':imagem' => $imagem,
            ':usuario_id' => $usuario_id
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Dados do canal salvos com sucesso.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
}