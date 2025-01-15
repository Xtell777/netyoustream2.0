<?php
session_start();

// Configuração do banco de dados
$host = 'localhost';
$db = 'u845457687_net_you_stream';
$user = 'u845457687_XTELL_777';
$pass = 'Tubarao777';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar dados do formulário
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash da senha
    $channel_name = strtolower(trim($_POST['channel_name']));
    $channel_description = trim($_POST['channel_description']);
    $channel_image = $_FILES['channel_image'];
    $unique_channel_name = "@$channel_name";

    // Redes sociais e plataformas de streaming
    $facebook = $_POST['facebook'] ?? null;
    $instagram = $_POST['instagram'] ?? null;
    $twitter = $_POST['twitter'] ?? null;
    $spotify = $_POST['spotify'] ?? null;
    $soundcloud = $_POST['soundcloud'] ?? null;
    $youtube = $_POST['youtube'] ?? null;

    // Verificar se o e-mail já está cadastrado e associado a um canal
    $check_email = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    if (!$check_email) {
        die("Erro ao preparar consulta SQL (verificação de e-mail): " . $conn->error);
    }
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $email_result = $check_email->get_result();

    if ($email_result->num_rows > 0) {
        // E-mail já registrado, verificar se está associado a um canal
        $check_channel = $conn->prepare("SELECT nome FROM canais WHERE usuario_id = (SELECT user_id FROM users WHERE email = ?)");
        if (!$check_channel) {
            die("Erro ao preparar consulta SQL (verificação de canal): " . $conn->error);
        }
        $check_channel->bind_param("s", $email);
        $check_channel->execute();
        $channel_result = $check_channel->get_result();

        if ($channel_result->num_rows > 0) {
            die("Este e-mail já está associado a um canal. Cada canal pode ter apenas um e-mail.");
        }
    }

    // Processar imagem do canal
    $image_path = "uploads/" . basename($channel_image['name']);
    if (!move_uploaded_file($channel_image['tmp_name'], $image_path)) {
        die("Erro ao enviar a imagem.");
    }

    // Inserir usuário e canal no banco de dados
    try {
        // Iniciar transação
        $conn->begin_transaction();

        // Inserir usuário
        $insert_user = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        if (!$insert_user) {
            throw new Exception("Erro ao preparar consulta SQL (inserção de usuário): " . $conn->error);
        }
        $insert_user->bind_param("ss", $email, $password);
        $insert_user->execute();
        $user_id = $conn->insert_id;

        // Inserir canal
        $insert_channel = $conn->prepare("
            INSERT INTO canais 
            (nome, imagem, descricao, usuario_id, facebook_url, instagram_url, twitter_url, spotify_url, soundcloud_url, youtube_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        if (!$insert_channel) {
            throw new Exception("Erro ao preparar consulta SQL (inserção de canal): " . $conn->error);
        }
        $insert_channel->bind_param(
            "ssssssssss",
            $unique_channel_name,
            $image_path,
            $channel_description,
            $user_id,
            $facebook,
            $instagram,
            $twitter,
            $spotify,
            $soundcloud,
            $youtube
        );
        $insert_channel->execute();

        // Confirmar a transação
        $conn->commit();
        echo "Canal criado com sucesso!";
    } catch (Exception $e) {
        // Reverter a transação em caso de erro
        $conn->rollback();
        die("Erro ao criar o canal: " . $e->getMessage());
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>