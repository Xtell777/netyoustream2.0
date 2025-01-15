<?php
// Conexão com o banco de dados
require_once 'db_connection.php';

session_start(); // Verifique a sessão ou ID do usuário

try {
    // Verifica se o usuário está logado e obtém o ID do usuário
    if (!isset($_SESSION['user_id'])) {
        throw new Exception('Usuário não autenticado.');
    }

    $user_id = $_SESSION['user_id']; // Substitua com a lógica de autenticação do seu sistema

    // Obtendo os dados enviados via POST
    $username = $_POST['username'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? null;

    // Validação simples dos campos obrigatórios
    if (empty($username) || empty($description)) {
        throw new Exception('Nome de usuário e descrição são obrigatórios.');
    }

    // Processamento da imagem, se houver
    $imagePath = null;
    if ($image && $image['error'] == 0) {
        // Verifique o tipo da imagem (apenas se for um tipo permitido)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            throw new Exception('Formato de imagem não permitido. Use JPEG, PNG ou GIF.');
        }

        // Define o caminho onde a imagem será salva
        $imagePath = 'uploads/' . basename($image['name']);
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            throw new Exception('Falha ao mover o arquivo de imagem.');
        }
    }

    // Atualizar os dados no banco de dados
    $query = "UPDATE usuarios SET username = ?, description = ?, image_url = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $description, $imagePath, $user_id]);

    // Resposta de sucesso
    echo json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso!']);

} catch (Exception $e) {
    // Caso ocorra algum erro, retornamos a mensagem de erro
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>