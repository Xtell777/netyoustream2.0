<?php
session_start();
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém o ID do usuário da sessão
$usuarioId = $_SESSION['usuario_id'] ?? null; // Verifica se a variável está definida

if (!$usuarioId) {
    echo "Você não está logado.";
    exit();
}

// Prepara e executa a consulta para obter informações do canal
$sql = "SELECT nome_canal, descricao, imagem_url, inscritos, total_videos, visualizacoes FROM canais WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$stmt->bind_result($nomeCanal, $descricao, $imagemUrl, $inscritos, $totalVideos, $visualizacoes);
$stmt->fetch();
$stmt->close();

// Verifica se o usuário possui um canal
if (!$nomeCanal) {
    echo "Você ainda não possui um canal.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Canal - <?php echo htmlspecialchars($nomeCanal, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="styles.css"> <!-- Inclua seu CSS -->
</head>
<body>
    <div id="channel-container">
        <h1><?php echo htmlspecialchars($nomeCanal, ENT_QUOTES, 'UTF-8'); ?></h1>
        <div id="channel-header">
            <div class="channel-info">
                <?php if ($imagemUrl): ?>
                    <img src="<?php echo htmlspecialchars($imagemUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="Imagem do canal <?php echo htmlspecialchars($nomeCanal, ENT_QUOTES, 'UTF-8'); ?>" class="channel-image">
                <?php else: ?>
                    <img src="default_image.png" alt="Imagem padrão" class="channel-image"> <!-- Imagem padrão caso não haja imagem do canal -->
                <?php endif; ?>
                <div id="channel-info">
                    <div class="stat-item">Inscritos: <?php echo htmlspecialchars($inscritos, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="stat-item">Vídeos: <?php echo htmlspecialchars($totalVideos, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="stat-item">Visualizações: <?php echo htmlspecialchars($visualizacoes, ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
            </div>
        </div>
        <div id="channel-description">
            <h2>Descrição</h2>
            <p><?php echo nl2br(htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8')); ?></p>
        </div>
        <div id="edit-channel-link">
            <a href="editar_canal.php">Editar Canal</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>