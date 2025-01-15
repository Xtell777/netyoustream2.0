// Suponha que `video_ids` seja um array de IDs enviado via GET (ex: video_ids=1,2,3)
$video_ids = isset($_GET['video_ids']) ? explode(',', $_GET['video_ids']) : [];
$video_ids = array_filter($video_ids, 'is_numeric'); // Verificar se são números válidos

if (!empty($video_ids)) {
    $placeholders = implode(',', array_fill(0, count($video_ids), '?'));
    $sql = "SELECT * FROM videos WHERE video_id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('i', count($video_ids)), ...$video_ids);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $videos = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($videos);
} else {
    echo json_encode(['status' => 'error', 'message' => 'IDs inválidos']);
}