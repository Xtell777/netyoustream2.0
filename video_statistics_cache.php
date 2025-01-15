<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Nome e localização do arquivo de cache
$cacheFile = 'cache/estatisticas.json';
$cacheTime = 600; // Tempo de cache em segundos (10 minutos)

// Verifica se o arquivo de cache existe e se ainda está válido
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    // Lê os dados do arquivo JSON do cache
    $data = json_decode(file_get_contents($cacheFile), true);
} else {
    // Consulta ao banco de dados para obter dados atualizados
    $sql = "SELECT video_id, title, subscribers, views, comments, publish_date, age_rating, duration 
            FROM videos 
            ORDER BY views DESC";
    $result = $conn->query($sql);

    // Caso a consulta tenha sucesso, salva os dados em $data e atualiza o cache
    if ($result) {
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            
            // Garante que a pasta de cache existe
            if (!file_exists('cache')) {
                mkdir('cache', 0777, true); // Cria a pasta 'cache' com permissões adequadas
            }

            // Salva os dados no arquivo de cache JSON
            file_put_contents($cacheFile, json_encode($data, JSON_PRETTY_PRINT));
        } else {
            $data = []; // Se não houver resultados, define $data como vazio
        }
    } else {
        die("Erro na consulta ao banco de dados: " . $conn->error); // Se a consulta falhar
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Exibe o conteúdo de estatisticas.json em formato JSON
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>