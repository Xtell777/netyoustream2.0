// Receber e validar dados enviados via POST
$video_id = filter_input(INPUT_POST, 'video_id', FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
$age_rating = filter_input(INPUT_POST, 'age_rating', FILTER_SANITIZE_STRING);
$views = filter_input(INPUT_POST, 'views', FILTER_VALIDATE_INT);
$subscribers = filter_input(INPUT_POST, 'subscribers', FILTER_VALIDATE_INT);
$publish_date = filter_input(INPUT_POST, 'publish_date', FILTER_SANITIZE_STRING);
$comments = filter_input(INPUT_POST, 'comments', FILTER_VALIDATE_INT);

// Verificar se os dados necessários estão presentes
if (!$video_id || !$user_id || !$title || !$views || !$subscribers || !$publish_date || !$comments) {
    echo json_encode(['status' => 'error', 'message' => 'Dados inválidos ou incompletos']);
    exit;
}