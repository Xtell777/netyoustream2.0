<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";  // Usando o novo usuário
$password = "Tubarao777";  // Usando a nova senha
$dbname = "u845457687_net_you_stream";  // Usando o novo nome do banco

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupera as estatísticas dos vídeos
$sql = "SELECT video_id, title, subscribers, views, comments, publish_date, age_rating, duration FROM videos ORDER BY views DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Estatísticas dos Vídeos</h1>";
    echo "<table border='1'>
            <tr>
                <th>Título</th>
                <th>Inscritos</th>
                <th>Visualizações</th>
                <th>Comentários</th>
                <th>Data de Publicação</th>
                <th>Classificação Etária</th>
                <th>Duração</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        // Formatação de números e datas
        $subscribersFormatted = number_format($row['subscribers']);
        $viewsFormatted = number_format($row['views']);
        $commentsFormatted = number_format($row['comments']);
        $publishDateFormatted = date('d/m/Y', strtotime($row['publish_date']));  // Exemplo de formato de data
        $durationFormatted = gmdate("H:i:s", $row['duration']);  // Formatação de duração em horas: minutos: segundos

        echo "<tr>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>$subscribersFormatted</td>
                <td>$viewsFormatted</td>
                <td>$commentsFormatted</td>
                <td>$publishDateFormatted</td>
                <td>" . htmlspecialchars($row['age_rating']) . "</td>
                <td>$durationFormatted</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum vídeo encontrado.";
}

$conn->close();
?>