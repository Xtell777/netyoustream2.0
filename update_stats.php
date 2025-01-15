<?php
// Atualiza o número de visualizações do vídeo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'increment_views') {
    $video_id = 1;  // Alterar para o video_id desejado
    $sql = "UPDATE videos SET views = views + 1 WHERE video_id = :video_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':video_id', $video_id);
    $stmt->execute();
    echo "<p>Visualizações atualizadas!</p>";
}
?>

<!-- Botão para simular uma visualização -->
<form method="post">
    <input type="hidden" name="action" value="increment_views">
    <button type="submit">Simular Visualização</button>
</form>