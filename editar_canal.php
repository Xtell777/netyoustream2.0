<?php
session_start();
// Configurações do banco de dados
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$usuarioId = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualizar o canal no banco de dados
    $nomeCanal = $_POST['nome_canal'];
    $descricao = $_POST['descricao'];
    
    $sql_update = "UPDATE canais SET nome_canal = ?, descricao = ? WHERE usuario_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssi", $nomeCanal, $descricao, $usuarioId);
    $stmt_update->execute();
    
    header("Location: perfil_canal.php");
    exit();
}

// Buscar dados do canal
$sql = "SELECT nome_canal, descricao FROM canais WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();
$canal = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Canal</title>
    <!-- Estilos e scripts adicionais -->
</head>
<body>
    <div id="edit-channel-form">
        <h3>Editar Informações do Canal</h3>
        <form method="post">
            <div class="form-group">
                <label for="nome_canal">Nome do Canal:</label>
                <input type="text" id="nome_canal" name="nome_canal" value="<?php echo htmlspecialchars($canal['nome_canal']); ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Canal:</label>
                <textarea id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($canal['descricao']); ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>