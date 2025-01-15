<?php
session_start();

// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Configurações de cache
$cacheFile = 'cache/estatisticas.json';
$cacheTime = 600; // 10 minutos em segundos

// Verifica se o arquivo de cache existe e se ainda está dentro do tempo de validade
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    // Carrega os dados do cache
    $data = json_decode(file_get_contents($cacheFile), true);
} else {
    // Consulta o banco de dados para obter os dados atualizados
    $sql = "SELECT video_id, title, subscribers, views, comments, publish_date, age_rating, duration FROM videos ORDER BY views DESC";
    $result = $conn->query($sql);

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        
        // Armazena os dados em cache como JSON
        if (!file_exists('cache')) {
            mkdir('cache', 0777, true); // Cria o diretório cache se não existir
        }
        file_put_contents($cacheFile, json_encode($data));
    } else {
        $data = []; // Caso haja algum erro na consulta
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Use a variável $data para exibir as estatísticas conforme necessário
?>