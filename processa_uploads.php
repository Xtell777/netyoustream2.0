<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'conexao.php'; // Certifique-se de incluir o arquivo de conexão

    header('Content-Type: application/json'); // Retornar resposta JSON

    // Verifica se o arquivo foi enviado
    if (!empty($_FILES['file']['name'])) {
        // Processar upload de arquivo
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['mp4', 'mov', 'avi', 'jpg', 'png'];

        $title = $_POST['title'] ?? 'Sem Título';
        $description = $_POST['description'] ?? '';
        $category = $_POST['category'] ?? 'Outros';
        $rating = $_POST['rating'] ?? 'Livre';

        // Validar extensão do arquivo
        if (in_array($fileExt, $allowed)) {
            // Verificar erros no upload
            if ($fileError === 0) {
                // Limitar tamanho do arquivo a 1 GB
                if ($fileSize <= 1073741824) { // 1 GB em bytes
                    // Caminho de destino
                    $targetDir = "uploads/";
                    $uniqueName = uniqid('', true) . "." . $fileExt; // Gerar nome único para evitar conflitos
                    $targetFile = $targetDir . $uniqueName;

                    // Mover arquivo para o diretório "uploads"
                    if (move_uploaded_file($fileTmpName, $targetFile)) {
                        // Inserir no banco de dados
                        $stmt = $conn->prepare("INSERT INTO uploads (title, description, category, rating, file_path) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssss", $title, $description, $category, $rating, $targetFile);
                        if ($stmt->execute()) {
                            echo json_encode([
                                'success' => true,
                                'message' => 'Arquivo enviado com sucesso!',
                                'filePath' => $targetFile,
                                'title' => $title
                            ]);
                        } else {
                            echo json_encode([
                                'success' => false,
                                'message' => 'Erro ao salvar informações no banco de dados.'
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'success' => false,
                            'message' => 'Erro ao mover o arquivo para o diretório de uploads.'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'O arquivo excede o limite de 1 GB.'
                    ]);
                }
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Erro ao fazer upload do arquivo.'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Formato de arquivo não permitido. Apenas MP4, MOV, AVI, JPG e PNG são aceitos.'
            ]);
        }
    }
    // Verifica se foi enviado um link de vídeo
    elseif (!empty($_POST['video_url'])) {
        // Processar envio de URL
        $videoUrl = $_POST['video_url'];
        $title = "Vídeo Enviado via URL";

        // Inserir no banco de dados
        $stmt = $conn->prepare("INSERT INTO uploads (title, url, category, rating) VALUES (?, ?, 'URL', 'Livre')");
        $stmt->bind_param("ss", $title, $videoUrl);
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'URL salva com sucesso!',
                'url' => $videoUrl,
                'title' => $title
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Erro ao salvar URL no banco de dados.'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Nenhum arquivo ou URL enviado.'
        ]);
    }
}
?>