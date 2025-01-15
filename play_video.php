<?php
// video.php

// Verifica se o parâmetro 'titulo' está presente na URL
if (isset($_GET['titulo'])) {
    $titulo = $_GET['titulo']; // Obtém o título passado como parâmetro na URL

    // Substituir hífens por espaços e formatar o título
    $titulo_formatado = str_replace('-', ' ', ucwords($titulo));

    // Aqui você pode buscar o vídeo no banco de dados usando $titulo_formatado
    // Exemplo de consulta ao banco de dados (substitua por sua lógica)
    // $stmt = $pdo->prepare("SELECT * FROM videos WHERE title = :title");
    // $stmt->execute(['title' => $titulo_formatado]);
    // $video = $stmt->fetch(PDO::FETCH_ASSOC);

    // Exemplo de exibição
    echo "<h1>$titulo_formatado</h1>";
} else {
    echo "<h1>Título não especificado.</h1>"; // Mensagem de erro se 'titulo' não estiver na URL
}
?>