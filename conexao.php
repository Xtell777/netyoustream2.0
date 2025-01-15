<?php
$servername = "localhost"; // A maioria dos servidores da Hostinger usa "localhost" como servidor
$username = "u845457687_XTELL_777"; // Nome de usuário do banco de dados
$password = "Tubarao777"; // Senha do banco de dados
$dbname = "u845457687_net_you_stream"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("A conexão falhou: " . $conn->connect_error);
}
echo "Conectado com sucesso ao banco de dados!";
?>