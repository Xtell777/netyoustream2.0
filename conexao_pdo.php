<?php
$host = 'localhost'; // ou o endereço do servidor de banco de dados
$dbname = 'net_you_stream';
$username = 'u845457687_XTELL_777';
$password = 'Tubarao777';

// Conexão com MySQL usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuração para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}
?>