<?php
session_start(); // Iniciar a sessão para acessar a variável $_SESSION

// Conectar ao banco de dados
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID do usuário está presente na sessão
if (isset($_SESSION['usuario_id'])) {
    $usuarioId = $_SESSION['usuario_id']; 

    // Preparar e executar a consulta para obter informações do canal
    $sql = "SELECT nome_canal, descricao, imagem_url, inscritos, total_videos, visualizacoes FROM canais WHERE usuario_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $stmt->bind_result($nomeCanal, $descricao, $imagemUrl, $inscritos, $totalVideos, $visualizacoes);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta.";
    }

    // Verificar se os dados foram encontrados
    if (isset($nomeCanal)) {
        ?>

        <div id="channel-container">
            <div id="channel-header">
                <div class="channel-info">
                    <img src="<?php echo htmlspecialchars($imagemUrl); ?>" alt="Imagem do canal <?php echo htmlspecialchars($nomeCanal); ?>" class="channel-image">
                    <div id="channel-info">
                        <h2><?php echo htmlspecialchars($nomeCanal); ?></h2>
                        <div id="channel-stats">
                            <div class="stat-item">Inscritos: <?php echo number_format($inscritos); ?></div>
                            <div class="stat-item">Vídeos: <?php echo number_format($totalVideos); ?></div>
                            <div class="stat-item">Visualizações: <?php echo number_format($visualizacoes); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="channel-description">
                <p><?php echo nl2br(htmlspecialchars($descricao)); ?></p>
            </div>
        </div>

        <?php
    } else {
        echo "Canal não encontrado.";
    }
} else {
    echo "Usuário não autenticado.";
}

$conn->close();
?>