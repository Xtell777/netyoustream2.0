<?php
// Verifica se o método de envio é POST e se o arquivo foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video_file'])) {
    // Recupera o arquivo enviado
    $file = $_FILES['video_file'];
    $upload_dir = 'uploads/';  // Diretório onde o vídeo será armazenado
    $file_path = $upload_dir . basename($file['name']);  // Caminho completo do arquivo

    // Move o arquivo para o diretório de uploads
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Arquivo enviado com sucesso, agora vamos salvar as informações no banco de dados

        // Conectar ao banco de dados
        $conn = new mysqli("localhost", "u845457687_XTELL_777", "Tubarao777", "u845457687_net_you_stream");

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Erro de conexão com o banco de dados: " . $conn->connect_error);
        }

        // Recupera as informações adicionais do vídeo, como título e descrição
        $usuario_id = 1;  // Substitua pelo ID do usuário autenticado
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        // Prepara a consulta SQL para inserir os dados no banco
        $stmt = $conn->prepare("INSERT INTO videos (usuario_id, video_nome, video_path, titulo, descricao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $usuario_id, $file['name'], $file_path, $titulo, $descricao);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "Arquivo enviado e informações salvas com sucesso!";
        } else {
            echo "Erro ao salvar informações no banco de dados: " . $stmt->error;
        }

        // Fecha a consulta e a conexão com o banco
        $stmt->close();
        $conn->close();
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}
?>