$sql_videos = "SELECT titulo, url_video, visualizacoes FROM videos WHERE canal_id = ?";
$stmt_videos = $conn->prepare($sql_videos);
$stmt_videos->bind_param("i", $canalId);
$stmt_videos->execute();
$stmt_videos->bind_result($tituloVideo, $urlVideo, $visualizacoesVideo);

while ($stmt_videos->fetch()) {
    echo '<div class="video-card">';
    echo '<video src="' . htmlspecialchars($urlVideo) . '" controls width="100%" height="auto"></video>'; // Escapa a URL do vídeo
    echo '<div class="video-info">';
    echo '<p>' . htmlspecialchars($tituloVideo) . '</p>'; // Escapa o título do vídeo
    echo '<span>' . intval($visualizacoesVideo) . ' visualizações</span>'; // Garante que visualizações são tratadas como inteiro
    echo '</div></div>';
}

$stmt_videos->close(); // Fecha a declaração após o uso