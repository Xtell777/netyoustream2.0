<?php
session_start();
$conn = new mysqli("localhost", "net_user", "senhaForte123", "net_you_stream_db");

$usuarioId = $_SESSION['usuario_id'];
$nomeCanal = $_POST['nome_canal'];
$descricao = $_POST['descricao'];

// Verificar se o usuário já possui um canal
$sql_verifica = "SELECT id FROM canais WHERE usuario_id = ?";
$stmt_verifica = $conn->prepare($sql_verifica);
$stmt_verifica->bind_param("i", $usuarioId);
$stmt_verifica->execute();
$stmt_verifica->store_result();

if ($stmt_verifica->num_rows > 0) {
    // Se o canal já existir, redirecione para edição ou informe o erro
    echo "Erro: Você já possui um canal associado.";
    // Ou redirecionar para a página de edição do canal existente
    header("Location: editar_canal.php");
    exit();
} else {
    // Criação do canal, pois o usuário ainda não possui um
    $sql_insert = "INSERT INTO canais (usuario_id, nome_canal, descricao) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iss", $usuarioId, $nomeCanal, $descricao);
    $stmt_insert->execute();
    header("Location: perfil_canal.php");
}

$stmt_verifica->close();
$stmt_insert->close();
$conn->close();
?>