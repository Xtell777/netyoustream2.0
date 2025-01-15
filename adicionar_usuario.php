<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'u845457687_net_you_stream';
$user = 'u845457687_XTELL_777';
$pass = 'Tubarao777';

try {
    // Conecta ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Dados do usuário XTELL 777
    $username = 'XTELL 777';
    $password = 'senhaSegura';  // Aqui você deve definir a senha para o usuário
    $email = 'xtell777@example.com';  // Defina o e-mail de registro do usuário

    // Criptografa a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insere o usuário no banco de dados
    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':email', $email);

    // Executa a inserção e retorna uma mensagem
    if ($stmt->execute()) {
        echo "Usuário XTELL 777 registrado com sucesso!";
    } else {
        echo "Erro ao registrar o usuário.";
    }
} catch (PDOException $e) {
    // Em caso de erro no banco de dados
    echo "Erro no servidor: " . $e->getMessage();
}
?>