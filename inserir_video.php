<?php
// Configuração de conexão com o banco de dados usando PDO
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Definir o modo de erro do PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL para inserir um vídeo
    $sql = "INSERT INTO videos (titulo, url_video, categoria, duracao, classificacao, usuario_id)
            VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparar a query
    $stmt = $pdo->prepare($sql);

    // Executar a query com os parâmetros
    $stmt->execute(['XTELL 777 - Gang de Ponte', 'https://www.youtube.com/embed/atLVRfmh9Ps', 'Música', '1:37', '🔞+', 1]);

    echo "Vídeo inserido com sucesso!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão
$pdo = null;
?>