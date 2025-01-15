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
        $password = password_hash($data->password, PASSWORD_BCRYPT); // Hasheamento seguro da senha

        // Inserção no banco de dados
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        echo json_encode(["message" => "Usuário registrado com sucesso!"]);
    } else {
        echo json_encode(["message" => "Dados incompletos."]);
    }
} catch (PDOException $e) {
    echo json_encode(["message" => "Erro no servidor: " . $e->getMessage()]);
}
?>