<?php
session_start();

// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera o ID do usuário da sessão
$usuarioId = $_SESSION['usuario_id'];

// Consulta para buscar informações do canal
$sql = "SELECT nome_canal, descricao, imagem_url, inscritos, total_videos, visualizacoes FROM canais WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o canal foi encontrado
if ($result->num_rows > 0) {
    $canal = $result->fetch_assoc();  // Canal encontrado
} else {
    // Redireciona para a página de criação de canal se não existir
    header("Location: criar_canal.php");
    exit();
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Canal</title>
    <link rel="stylesheet" href="styles.css"> <!-- Inclua seu arquivo CSS aqui -->
</head>
<body>
    <div id="channel-container">
        <div id="channel-header">
            <div class="channel-info">
                <!-- Imagem do canal (com imagem padrão se não houver imagem do canal) -->
                <img src="<?php echo htmlspecialchars($canal['imagem_url'] ?: 'default_image.jpg'); ?>" 
                     alt="Imagem do canal <?php echo htmlspecialchars($canal['nome_canal']); ?>" 
                     class="channel-image">
                <div id="channel-info">
                    <h2><?php echo htmlspecialchars($canal['nome_canal']); ?></h2>
                    <div id="channel-stats">
                        <div class="stat-item">Inscritos: <?php echo intval($canal['inscritos']); ?></div>
                        <div class="stat-item">Vídeos: <?php echo intval($canal['total_videos']); ?></div>
                        <div class="stat-item">Visualizações: <?php echo intval($canal['visualizacoes']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="channel-description">
            <!-- Exibe a descrição do canal -->
            <p><?php echo nl2br(htmlspecialchars($canal['descricao'])); ?></p>
        </div>
        <a href="editar_canal.php">Editar Canal</a>
    </div>
</body>
</html>