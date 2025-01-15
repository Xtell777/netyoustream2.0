<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777"; // Usuário
$password = "Tubarao777";           // Senha
$dbname = "u845457687_net_you_stream"; // Nome do banco de dados

try {
    // Conexão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Definir o modo de erro para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

// O código que segue pode continuar a partir daqui...
?>