<?php
// Recupera os comentários do vídeo
$sql = "SELECT * FROM comments WHERE video_id = 1";  // Alterar para o video_id desejado
$stmt = $conn->prepare($sql);
$stmt->execute();

// Exibe os comentários
if ($stmt->rowCount() > 0) {
    echo "<div id='comment-list'>";
    while ($comment = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='comment'>";
        echo "<p><strong>" . htmlspecialchars($comment['author_name']) . ":</strong> " . htmlspecialchars($comment['comment_text']) . "</p>";
        echo "<p><i>Publicado em: " . $comment['date_posted'] . "</i></p>";
        echo "<p><strong>Curtidas:</strong> " . number_format($comment['likes']) . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>Este vídeo não tem comentários ainda.</p>";
}
?>