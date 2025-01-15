<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupera as estatísticas dos vídeos
$sql = "SELECT video_id, title, url, subscribers, views, comments, publish_date, age_rating, duration FROM videos ORDER BY views DESC";
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
        // Formatação de data para o formato 'DD/MM/YYYY'
        $formattedDate = date('d/m/Y', strtotime($row['publish_date']));
        
        // Formatação de duração (assumindo que a duração está em segundos)
        $durationFormatted = gmdate("H:i:s", $row['duration']);
        
        // Exibe os dados
        echo "<tr>
                <td><a href='{$row['url']}' target='_blank'>{$row['title']}</a></td>
                <td>" . number_format($row['subscribers']) . "</td>
                <td>" . number_format($row['views']) . "</td>
                <td>" . number_format($row['comments']) . "</td>
                <td>{$formattedDate}</td>
                <td>{$row['age_rating']}</td>
                <td>{$durationFormatted}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum vídeo encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>