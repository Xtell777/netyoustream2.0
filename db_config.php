<?php
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
?>