<?php
session_start(); // Inicia a sessão

$host = 'localhost';  // Host do banco de dados
$dbname = 'u845457687_net_you_stream';  // Nome do banco de dados
$username = 'u845457687_XTELL_777';  // Nome de usuário do banco de dados
$password = 'Tubarao777';  // Senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar se o usuário existe e a senha está correta
    if ($user && password_verify($password, $user['password'])) {
        // Gerar um token de autenticação (opcional)
        $token = bin2hex(random_bytes(16));  // Exemplo de geração de token
        $updateToken = $pdo->prepare("UPDATE users SET token = :token WHERE username = :username");
        $updateToken->bindParam(':token', $token);
        $updateToken->bindParam(':username', $username);
        $updateToken->execute();

        // Salvar o ID do usuário e o token na sessão
        $_SESSION['user_id'] = $user['id']; // Armazenando o ID do usuário na sessão
        $_SESSION['token'] = $token;         // Armazenando o token na sessão

        // Redirecionar para a página do canal após o login bem-sucedido
        header("Location: https://www.netyoustream.com");
        exit();
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>