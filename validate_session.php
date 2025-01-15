session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $_POST['user_id']) {
    echo json_encode(['status' => 'error', 'message' => 'Acesso não autorizado']);
    exit;
}