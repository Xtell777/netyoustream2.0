<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

// Conectar ao banco de dados
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$usuarioId = $_SESSION['usuario_id'];

// Buscar informações do canal
$sql = "SELECT nome_canal, descricao, imagem_url, inscricoes, videos, visualizacoes FROM canais WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Canal encontrado
    $canal = $result->fetch_assoc();
} else {
    // Redireciona para criação se o canal não existir
    header("Location: criar_canal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Canal</title>
    <!-- Estilos e scripts adicionais -->
</head>
<body>
    <div id="channel-container">
        <div id="channel-header">
            <div class="channel-info">
                <!-- Imagem do canal recuperada do banco de dados -->
                <img src="<?php echo htmlspecialchars($canal['imagem_url']); ?>" alt="Imagem do canal <?php echo htmlspecialchars($canal['nome_canal']); ?>" class="channel-image">
                <div id="channel-info">
                    <h2><?php echo htmlspecialchars($canal['nome_canal']); ?></h2>
                    <div id="channel-stats">
                        <div class="stat-item">Inscritos: <?php echo htmlspecialchars($canal['inscricoes']); ?></div>
                        <div class="stat-item">Vídeos: <?php echo htmlspecialchars($canal['videos']); ?></div>
                        <div class="stat-item">Visualizações: <?php echo htmlspecialchars($canal['visualizacoes']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="channel-description">
            <p><?php echo nl2br(htmlspecialchars($canal['descricao'])); ?></p>
        </div>
        <a href="editar_canal.php">Editar Canal</a>
    </div>
</body>
</html>