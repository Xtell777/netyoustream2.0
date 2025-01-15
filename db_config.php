<?php
$servername = getenv('DB_SERVER') ?: "localhost"; // Usando variáveis de ambiente para o servidor
$username = getenv('DB_USERNAME') ?: "u845457687_XTELL_777"; // Usando variáveis de ambiente para o nome de usuário
$password = getenv('DB_PASSWORD') ?: "Tubarao777"; // Usando variáveis de ambiente para a senha
$dbname = getenv('DB_NAME') ?: "u845457687_net_you_stream"; // Usando variáveis de ambiente para o nome do banco de dados

// Criação da conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    // Em vez de mostrar o erro diretamente, registre-o em um arquivo de log
    error_log("Falha na conexão com o banco de dados: " . $conn->connect_error);
    die("Erro na conexão com o banco de dados.");
}
?>