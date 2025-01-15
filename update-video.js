fetch("save_video.php", {
    // ... (configuração de fetch)
})
.then(response => response.json())
.then(data => {
    if (data.status === 'success') {
        loadVideoData();
        showMessage('success', 'Dados do vídeo atualizados com sucesso');
    } else {
        showMessage('error', data.message);
    }
})
.catch(error => showMessage('error', 'Erro ao atualizar dados do vídeo'));