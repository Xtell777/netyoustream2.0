<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Conexão PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Definir o modo de erro para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

// Recupera as estatísticas dos vídeos do banco de dados
$sql = "SELECT * FROM videos WHERE video_id = 1";  // Aqui você pode alterar o video_id conforme necessário
$stmt = $conn->prepare($sql);
$stmt->execute();

// Verifica se o vídeo foi encontrado
if ($stmt->rowCount() > 0) {
    $video = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<h3>" . htmlspecialchars($video['title']) . "</h3>";
    echo "<iframe src='" . htmlspecialchars($video['embed_url']) . "' frameborder='0' allowfullscreen></iframe>";
    echo "<p><strong>Inscritos:</strong> " . number_format($video['subscribers']) . "</p>";
    echo "<p><strong>Visualizações:</strong> " . number_format($video['views']) . "</p>";
    echo "<p><strong>Comentários:</strong> " . number_format($video['comments']) . "</p>";
    echo "<p><strong>Classificação Etária:</strong> " . htmlspecialchars($video['age_rating']) . "</p>";
    echo "<p><strong>Duração:</strong> " . htmlspecialchars($video['duration']) . "</p>";
} else {
    echo "Vídeo não encontrado.";
}

// Fecha a conexão
$conn = null;
?>