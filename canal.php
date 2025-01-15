<?php
include 'db.php'; // Inclui o arquivo de conexão ao banco de dados

$user_id = 1; // Substitua pelo ID do usuário que deseja buscar

// Prepara a consulta SQL para buscar as informações do canal
$stmt = $pdo->prepare("SELECT * FROM canais WHERE user_id = ?");
$stmt->execute([$user_id]);
$canal = $stmt->fetch(); // Recupera os dados do canal

if ($canal) {
    // Exibe as informações do canal em um formato HTML
    echo '<div id="channel-container" data-user-id="' . htmlspecialchars($canal['user_id']) . '">';
    echo '<div id="channel-header">';
    echo '<div class="channel-info">';
    echo '<img src="' . htmlspecialchars($canal['imagem']) . '" alt="Imagem do canal ' . htmlspecialchars($canal['nome']) . '" class="channel-image">';
    echo '<div id="channel-info">';
    echo '<h2>' . htmlspecialchars($canal['nome']) . '</h2>';
    echo '<div id="channel-stats">';
    echo '<div class="stat-item">Inscritos: ' . number_format($canal['inscritos']) . '</div>';
    echo '<div class="stat-item">Vídeos: ' . number_format($canal['videos']) . '</div>';
    echo '<div class="stat-item">Visualizações: ' . number_format($canal['visualizacoes']) . '</div>';
    echo '</div></div></div></div>';
    echo '<div id="channel-description">';
    echo '<p>' . htmlspecialchars($canal['descricao']) . '</p>'; // Escapa caracteres especiais
    echo '</div></div>';
} else {
    echo "Canal não encontrado.";
}
?>