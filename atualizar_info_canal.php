<?php
session_start();

// Conectar ao banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777";
$password = "Tubarao777";
$dbname = "u845457687_net_you_stream";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém o ID do usuário da sessão
$usuarioId = $_SESSION['usuario_id'];
$novoNomeCanal = $_POST['nome_canal'];
$novaDescricao = $_POST['descricao'];

// Validar se os campos obrigatórios foram preenchidos
if (empty($novoNomeCanal) || empty($novaDescricao)) {
    die("Erro: Nome do canal e descrição são obrigatórios.");
}

// Processar upload da imagem
$imagemUrl = null; // Inicializa a variável da URL da imagem
if (isset($_FILES['imagem_canal']) && $_FILES['imagem_canal']['error'] == 0) {
    $diretorio = 'uploads/';
    $imagemUrl = $diretorio . basename($_FILES['imagem_canal']['name']);
    
    // Tenta mover o arquivo enviado para o diretório
    if (!move_uploaded_file($_FILES['imagem_canal']['tmp_name'], $imagemUrl)) {
        die("Erro: Falha ao fazer upload da imagem.");
    }
}

// Atualizar as informações do canal
$sql = "UPDATE canais SET nome_canal = ?, descricao = ?, imagem_url = IFNULL(?, imagem_url) WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $novoNomeCanal, $novaDescricao, $imagemUrl, $usuarioId);
$stmt->execute();

// Verifica se a atualização foi bem-sucedida
if ($stmt->affected_rows > 0) {
    header("Location: perfil_canal.php");
    exit();
} else {
    echo "Erro: Nenhuma alteração foi feita ou falha ao atualizar.";
}

$stmt->close();
$conn->close();
?>