<?php
// Verifica se foi enviado um novo comentário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $comment_text = $_POST['comment_text'];
    $video_id = 1;  // Alterar para o video_id desejado

    // Inserir comentário no banco de dados
    $sql = "INSERT INTO comments (video_id, author_name, comment_text) VALUES (:video_id, :author_name, :comment_text)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':video_id', $video_id);
    $stmt->bindParam(':author_name', $author_name);
    $stmt->bindParam(':comment_text', $comment_text);

    if ($stmt->execute()) {
        echo "<p>Comentário adicionado com sucesso!</p>";
    } else {
        echo "<p>Erro ao adicionar o comentário.</p>";
    }
}
?>

<!-- Formulário para adicionar comentário -->
<form method="post">
    <input type="text" name="author_name" placeholder="Seu nome" required>
    <textarea name="comment_text" placeholder="Escreva seu comentário" required></textarea>
    <button type="submit">Adicionar Comentário</button>
</form>