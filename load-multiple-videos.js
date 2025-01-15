function loadMultipleVideos(videoIds) {
    fetch(`get_videos.php?video_ids=${videoIds.join(',')}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(video => {
                document.getElementById(`views-${video.video_id}`).textContent = video.views;
                document.getElementById(`comments-${video.video_id}`).textContent = video.comments;
                // Atualize outras informações conforme necessário
            });
        })
        .catch(error => console.error("Erro ao carregar dados dos vídeos:", error));
}

// Suponha que você tenha IDs de vídeo em um array
const videoIds = [1, 2, 3]; // exemplo de IDs
loadMultipleVideos(videoIds);