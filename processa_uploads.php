<?php
session_start();

$host = "localhost";
$db_user = "u845457687_XTELL_777";
$db_pass = "Tubarao777";
$db_name = "u845457687_net_you_stream";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se é upload de arquivo ou envio de URL
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['mp4', 'mov', 'avi', 'jpg', 'png'];

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize <= 50000000) { // Limite de 50MB
                    $fileNewName = uniqid('', true) . "." . $fileExt;
                    $fileDestination = 'uploads/' . $fileNewName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // Inserir no banco de dados
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $category = $_POST['category'];
                        $rating = $_POST['rating'];

                        $stmt = $conn->prepare("INSERT INTO uploads (title, description, category, rating, file_path) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssss", $title, $description, $category, $rating, $fileNewName);

                        if ($stmt->execute()) {
                            echo "Upload realizado com sucesso!";
                        } else {
                            echo "Erro ao salvar no banco de dados.";
                        }
                    } else {
                        echo "Erro ao mover o arquivo.";
                    }
                } else {
                    echo "Arquivo muito grande.";
                }
            } else {
                echo "Erro no upload.";
            }
        } else {
            echo "Tipo de arquivo não permitido.";
        }
    } elseif (isset($_POST['video_url'])) {
        $videoUrl = json_decode(file_get_contents('php://input'), true)['video_url'];
        $stmt = $conn->prepare("INSERT INTO uploads (title, file_path) VALUES (?, ?)");
        $stmt->bind_param("ss", $videoUrl, $videoUrl);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'URL enviada com sucesso!']);
        } else {
            echo json_encode(['message' => 'Erro ao salvar a URL.']);
        }
    }
}

$conn->close();
?>