<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Dados de exemplo para atualização (substituir com dados reais ou API)
$videos = [
    [
        'video_id' => 'atLVRfmh9Ps',
        'title' => 'GANG DE PONTE',
        'url' => 'http://www.netyoustream.com/xtell-777/gang-de-ponte-official-audio',
        'subscribers' => 500000,
        'views' => 1234567,
        'comments' => 123,
        'publish_date' => '2024-10-20',
        'age_rating' => '🔞+',
        'duration' => '00:01:37'
    ],
    [
        'video_id' => '-PrAH0-cbQY',
        'title' => 'LUXO E VISÃO 2',
        'url' => 'http://www.netyoustream.com/xtell-777/luxo-e-visao-2-official-audio',
        'subscribers' => 500000,
        'views' => 2345678,
        'comments' => 234,
        'publish_date' => '2024-10-19',
        'age_rating' => '🔞+',
        'duration' => '00:01:41'
    ],
    // Adicione outros vídeos aqui...
];

// Atualiza cada vídeo na tabela
foreach ($videos as $video) {
    $stmt = $conn->prepare("INSERT INTO videos (video_id, title, url, subscribers, views, comments, publish_date, age_rating, duration)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE
                            title = VALUES(title),
                            url = VALUES(url),
                            subscribers = VALUES(subscribers),
                            views = VALUES(views),
                            comments = VALUES(comments),
                            publish_date = VALUES(publish_date),
                            age_rating = VALUES(age_rating),
                            duration = VALUES(duration)");

    $stmt->bind_param("ssiiissss", $video['video_id'], $video['title'], $video['url'], $video['subscribers'], 
                      $video['views'], $video['comments'], $video['publish_date'], $video['age_rating'], $video['duration']);
    
    if ($stmt->execute()) {
        echo "Vídeo '{$video['title']}' atualizado com sucesso.<br>";
    } else {
        echo "Erro ao atualizar vídeo '{$video['title']}': " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Fecha a conexão
$conn->close();
?>