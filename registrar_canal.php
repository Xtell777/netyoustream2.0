<?php
session_start();

// Conectar ao banco de dados
$conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream"); // Substitua pelas suas credenciais de produção

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar dados do formulário e verificar se o usuário está logado
$usuarioId = $_SESSION['usuario_id'] ?? null; // Garantir que o usuário esteja logado
$nomeCanal = $_POST['nome_canal'] ?? '';
$descricao = $_POST['descricao'] ?? '';

// Validar campos obrigatórios
if (empty($nomeCanal) || empty($descricao)) {
    echo "Erro: O nome do canal e a descrição são obrigatórios.";
    exit();
}

// Verificar se o usuário já possui um canal
$sql_verifica = "SELECT id FROM canais WHERE usuario_id = ?";
$stmt_verifica = $conn->prepare($sql_verifica);
$stmt_verifica->bind_param("i", $usuarioId);
$stmt_verifica->execute();
$stmt_verifica->store_result();

if ($stmt_verifica->num_rows > 0) {
    // Se o canal já existir, redirecionar para a edição ou mostrar um erro
    echo "Erro: Você já possui um canal associado.";
    header("Location: editar_canal.php");
    exit();
} else {
    // Inserir um novo canal, pois o usuário não possui um canal associado
    $sql_insert = "INSERT INTO canais (usuario_id, nome_canal, descricao) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iss", $usuarioId, $nomeCanal, $descricao);
    
    // Verificar se a inserção foi bem-sucedida
    if ($stmt_insert->execute()) {
        // Redirecionar para a página de perfil do canal após a inserção
        header("Location: perfil_canal.php");
        exit();
    } else {
        // Caso ocorra um erro durante a inserção
        echo "Erro ao criar o canal: " . $stmt_insert->error;
    }
}

$stmt_verifica->close();
$stmt_insert->close();
$conn->close();
?>