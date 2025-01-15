<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'u845457687_net_you_stream';
$user = 'u845457687_XTELL_777';
$pass = 'Tubarao777';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"));

    if(isset($data->username) && isset($data->password)) {
        $username = $data->username;
        $password = $data->password;

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                echo json_encode(["message" => "Login bem-sucedido!", "token" => md5(uniqid($user['username'], true))]);
            } else {
                echo json_encode(["message" => "Senha incorreta."]);
            }
        } else {
            echo json_encode(["message" => "Usuário não encontrado."]);
        }
    } else {
        echo json_encode(["message" => "Dados incompletos."]);
    }
} catch (PDOException $e) {
    echo json_encode(["message" => "Erro no servidor: " . $e->getMessage()]);
}
?>