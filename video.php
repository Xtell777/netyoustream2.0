<?php
// video.php
include 'db.php'; // Inclui o arquivo de conexão ao banco de dados

// Verifica se o parâmetro 'video' está presente na URL
if (isset($_GET['video'])) {
    $video_slug = $_GET['video'];

    // Consulta ao banco de dados para obter os detalhes do vídeo
    try {
        $stmt = $pdo->prepare("SELECT * FROM videos WHERE slug = :slug");
        $stmt->execute(['slug' => $video_slug]);
        $video = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($video) {
            // Exibe os dados do vídeo de forma segura
            $titulo = htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8');
            $descricao = htmlspecialchars($video['description'], ENT_QUOTES, 'UTF-8');
            $iframe = htmlspecialchars($video['iframe'], ENT_QUOTES, 'UTF-8');
            $views = number_format($video['views']);  // Formatação das visualizações
            $subscribers = number_format($video['subscribers']);  // Formatação dos inscritos
            $published = date('d/m/Y', strtotime($video['published_date'])); // Formatação da data
        } else {
            echo "Vídeo não encontrado.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        exit;
    }
} else {
    echo "Nenhum vídeo especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="channel-container">
        <div id="channel-header">
            <div class="channel-info">
                <h2><?php echo $titulo; ?></h2>
                <div id="channel-stats">
                    <div class="stat-item">Visualizações: <?php echo $views; ?></div>
                    <div class="stat-item">Inscritos: <?php echo $subscribers; ?></div>
                    <div class="stat-item">Publicado em: <?php echo $published; ?></div>
                </div>
            </div>
        </div>
        <div id="channel-description">
            <p><?php echo $descricao; ?></p>
        </div>
        <div id="video-container">
            <div class="video-container">
                <?php echo $iframe; ?>
            </div>
        </div>
    </div>
</body>
</html>