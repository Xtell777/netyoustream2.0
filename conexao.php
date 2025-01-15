<?php
session_start();

// Conexão com o banco de dados 'net_user'
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream"); // Substituir pelas suas credenciais de produção

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Exemplo de interação com o banco de dados - Consulta a tabela de usuários
$sql = "SELECT id, nome, email FROM usuarios WHERE id = ?"; // Exemplo de consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId); // Exemplo de parâmetro de consulta (substitua $usuarioId pela variável correta)
$stmt->execute();
$result = $stmt->get_result();

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Exibe os dados do usuário
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "Nenhum usuário encontrado.";
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>