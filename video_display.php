<?php
// video.php

// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777"; // Atualize para seu usuário
$password = "Tubarao777"; // Atualize para sua senha
$dbname = "u845457687_net_you_stream"; // Atualize para o nome correto do banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o parâmetro 'titulo' está presente na URL
if (isset($_GET['titulo'])) {
    // Sanitiza o título da URL para evitar injeção de HTML ou JavaScript
    $titulo = htmlspecialchars($_GET['titulo'], ENT_QUOTES, 'UTF-8');
    
    // Formatação do título (substituindo hífens por espaços e capitalizando)
    $titulo_formatado = str_replace('-', ' ', ucwords($titulo));

    // Consulta para buscar o vídeo no banco de dados
    $sql = "SELECT id, video_id FROM videos WHERE titulo = ?";
    $stmt = $conn->prepare($sql);
    
    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    
    // Liga o parâmetro da consulta
    $stmt->bind_param("s", $titulo_formatado);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se o vídeo foi encontrado
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $video_id);
        $stmt->fetch();
        
        // Exibe o título do vídeo
        echo "<h1>$titulo_formatado</h1>";
        
        // URL do vídeo no YouTube usando o ID do vídeo recuperado
        $video_url = "https://www.youtube.com/embed/$video_id"; 
        echo "
        <div class='video-container'>
            <iframe src='$video_url' frameborder='0' allowfullscreen></iframe>
        </div>";
    } else {
        echo "<h1>Vídeo não encontrado.</h1>";
    }

    $stmt->close();
} else {
    // Caso o parâmetro 'titulo' não esteja presente
    echo "<h1>Título do vídeo não especificado.</h1>";
}

// Fecha a conexão
$conn->close();
?>