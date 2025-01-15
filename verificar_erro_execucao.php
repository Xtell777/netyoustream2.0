if (!$stmt_update->execute()) {
    echo "Erro: " . $stmt_update->error;
}