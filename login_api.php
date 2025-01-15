<?php
// Exibir erros para depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir o arquivo de configuração do banco de dados
include 'db_config.php'; // Certifique-se de que este arquivo contém a variável $pdo com a conexão PDO

header('Content-Type: application/json'); // Define que a resposta será no formato JSON

// Obter os dados do POST (username e password)
$data = json_decode(file_get_contents("php://input"));
$username = $data->username ?? '';
$password = $data->password ?? '';

// Verificar se os dados não estão vazios
if (empty($username) || empty($password)) {
    echo json_encode(["message" => "Usuário e senha são obrigatórios."]);
    exit;
}

try {
    // Consultar o banco de dados para verificar o usuário
    $query = "SELECT * FROM users WHERE username = :username OR email = :username LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Se a senha estiver correta, gerar um token simples
        $token = bin2hex(random_bytes(16));
        echo json_encode(["message" => "Login bem-sucedido.", "token" => $token]);
    } else {
        echo json_encode(["message" => "Nome de usuário ou senha incorretos."]);
    }
} catch (Exception $e) {
    echo json_encode(["message" => "Erro ao processar o login: " . $e->getMessage()]);
}

?>