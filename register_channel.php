<?php
session_start();

// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão com o banco
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$usuarioId = $_SESSION['usuario_id'];
$nomeCanal = $_POST['nome_canal'];
$descricao = $_POST['descricao'];

// Sanitiza os dados de entrada para evitar SQL Injection e XSS
$nomeCanal = htmlspecialchars(trim($nomeCanal));
$descricao = htmlspecialchars(trim($descricao));

// Verificar se o usuário já possui um canal
$sql_verifica = "SELECT id FROM canais WHERE usuario_id = ?";
$stmt_verifica = $conn->prepare($sql_verifica);
$stmt_verifica->bind_param("i", $usuarioId);
$stmt_verifica->execute();
$stmt_verifica->store_result();

if ($stmt_verifica->num_rows > 0) {
    // Se o canal já existir, redireciona para edição ou informa o erro
    echo "Erro: Você já possui um canal associado.";
    // Ou redirecionar para a página de edição do canal existente
    header("Location: editar_canal.php");
    exit();
} else {
    // Criação do canal, pois o usuário ainda não possui um
    $sql_insert = "INSERT INTO canais (usuario_id, nome_canal, descricao) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iss", $usuarioId, $nomeCanal, $descricao);

    if ($stmt_insert->execute()) {
        // Redireciona para o perfil do canal após a criação
        header("Location: perfil_canal.php");
        exit();
    } else {
        // Caso ocorra um erro na inserção
        echo "Erro ao criar o canal: " . $stmt_insert->error;
    }
}

$stmt_verifica->close();
$stmt_insert->close();
$conn->close();
?>