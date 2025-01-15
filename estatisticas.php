<form method="GET" action="estatisticas.php">
    <label for="sort">Ordenar por:</label>
    <select name="sort" id="sort">
        <option value="views">Visualizações</option>
        <option value="subscribers">Inscritos</option>
        <option value="publish_date">Data de Publicação</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "net_user";
$password = "senhaForte123";
$dbname = "net_you_stream_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica o valor de ordenação e define a cláusula ORDER BY de forma segura
$validColumns = ['views', 'subscribers', 'publish_date'];
$orderBy = isset($_GET['sort']) && in_array($_GET['sort'], $validColumns) ? $_GET['sort'] : 'views';

$sql = "SELECT video_id, title, subscribers, views, comments, publish_date FROM videos ORDER BY $orderBy DESC";
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
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['subscribers']}</td>
                <td>{$row['views']}</td>
                <td>{$row['comments']}</td>
                <td>{$row['publish_date']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum vídeo encontrado.";
}

$conn->close();
?>