<?php
include 'db.php'; // Inclui o arquivo de conexão ao banco de dados

$user_id = 1; // Substitua pelo ID do usuário que deseja buscar

$stmt = $pdo->prepare("SELECT * FROM canais WHERE user_id = ?");
$stmt->execute([$user_id]);
$canal = $stmt->fetch();

if ($canal) {
    echo '<div id="channel-container" data-user-id="' . htmlspecialchars($canal['user_id']) . '">';
    echo '<div id="channel-header">';
    echo '<div class="channel-info">';

    // Verifica se a imagem existe e exibe
    $imagemUrl = !empty($canal['imagem']) ? $canal['imagem'] : 'default-image.jpg'; // Imagem padrão caso não haja imagem
    echo '<img src="' . htmlspecialchars($imagemUrl) . '" alt="Imagem do canal ' . htmlspecialchars($canal['nome']) . '" class="channel-image">';

    echo '<div id="channel-info">';
    echo '<h2>' . htmlspecialchars($canal['nome']) . '</h2>';
    echo '<div id="channel-stats">';
    echo '<div class="stat-item">Inscritos: ' . number_format($canal['inscritos']) . '</div>';
    echo '<div class="stat-item">Vídeos: ' . number_format($canal['videos']) . '</div>';
    echo '<div class="stat-item">Visualizações: ' . number_format($canal['visualizacoes']) . '</div>';
    echo '</div></div></div></div>';
    
    // Exibe a descrição do canal
    echo '<div id="channel-description">';
    echo '<p>' . htmlspecialchars($canal['descricao']) . '</p>';
    echo '</div></div>';
} else {
    echo "Canal não encontrado.";
}
?>