<?php

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
        
        // Recupera os valores dos campos do formulário
        $fullname = trim($_POST["fullname"]);
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Verifica se as senhas coincidem
        if ($password === $confirm_password) {
            
            // Hash da senha antes de armazená-la
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Conectar ao banco de dados (substitua com suas próprias configurações)
            $conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

            // Verifica se a conexão foi estabelecida com sucesso
            if ($conn->connect_error) {
                die("Erro de conexão com o banco de dados: " . $conn->connect_error);
            }

            // Prepara a consulta SQL usando prepared statements
            $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullname, $username, $email, $hashed_password);

            // Executa a consulta SQL
            if ($stmt->execute()) {
                echo "Usuário registrado com sucesso!";
            } else {
                echo "Erro ao registrar o usuário: " . $stmt->error;
            }

            // Fecha a consulta e a conexão com o banco de dados
            $stmt->close();
            $conn->close();
        } else {
            echo "As senhas não coincidem!";
        }
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
} else {
    echo "Este script só aceita solicitações POST!";
}

?>
