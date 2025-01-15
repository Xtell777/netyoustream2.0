<?php
$sql = "INSERT INTO comentarios (comentario_texto, usuario_id, video_id)
        VALUES (?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute(['Ótimo vídeo!', 1, 1]);
?>