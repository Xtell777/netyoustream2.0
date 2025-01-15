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

// Obtém os dados do formulário
$usuarioId = $_POST['usuario_id'];
$nomeCanal = $_POST['nome_canal'];
$descricao = $_POST['descricao'];
$imagemUrl = null;

// Processa o upload da nova imagem, se houver
if (isset($_FILES['imagem_canal']) && $_FILES['imagem_canal']['error'] == UPLOAD_ERR_OK) {
    $uploadsDir = 'uploads/';
    $filename = basename($_FILES['imagem_canal']['name']);
    $targetFile = $uploadsDir . uniqid() . '-' . $filename; // Previne sobreposição de nomes

    // Verifica se a pasta de uploads existe, se não, cria
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    // Move o arquivo para o diretório de uploads
    if (move_uploaded_file($_FILES['imagem_canal']['tmp_name'], $targetFile)) {
        $imagemUrl = $targetFile; // Define o caminho da imagem
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

// Atualiza as informações do canal no banco de dados
$sql = "UPDATE canais SET nome_canal = ?, descricao = ?" . ($imagemUrl ? ", imagem_url = ?" : "") . " WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);

if ($imagemUrl) {
    $stmt->bind_param("sssi", $nomeCanal, $descricao, $imagemUrl, $usuarioId);
} else {
    $stmt->bind_param("ssi", $nomeCanal, $descricao, $usuarioId);
}

if ($stmt->execute()) {
    echo "Informações do canal atualizadas com sucesso.";
    header("Location: perfil_canal.php"); // Redireciona para a página do perfil do canal
    exit();
} else {
    echo "Erro ao atualizar informações: " . $conn->error;
}

$stmt->close();
$conn->close();
?>