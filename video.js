document.addEventListener("DOMContentLoaded", function() {
    const videoId = document.getElementById("video-1").dataset.videoId;
    const userId = document.getElementById("video-1").dataset.userId;

    // Função para carregar dados do vídeo
    function loadVideoData() {
        fetch(`get_video.php?video_id=${videoId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'error') {
                    document.querySelector(".video-title").textContent = data.title;
                    document.querySelector(".video-views span").textContent = data.views;
                    document.querySelector(".channel-subscribers span").textContent = data.subscribers;
                    document.querySelector(".video-publish-date span").textContent = calculateDaysSincePublish(data.publish_date);
                    document.querySelector(".video-comments span").textContent = data.comments;
                } else {
                    console.error("Erro ao carregar dados do vídeo:", data.message);
                }
            })
            .catch(error => console.error("Erro ao carregar dados do vídeo:", error));
    }

    // Função para atualizar dados do vídeo
    function updateVideoStats(views, comments) {
        fetch("save_video.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                video_id: videoId,
                user_id: userId,
                title: "XTELL 777 - GANG DE PONTE",
                category: "Música",
                age_rating: "🔞+",
                views: views,
                subscribers: 1000000,  // Exemplo, insira o valor atual
                publish_date: "2024-11-01",  // Substitua com a data correta
                comments: comments
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadVideoData();
            } else {
                console.error("Erro ao atualizar dados do vídeo:", data.message);
            }
        })
        .catch(error => console.error("Erro ao atualizar dados do vídeo:", error));
    }

    // Função para calcular dias desde a publicação
    function calculateDaysSincePublish(publishDate) {
        const publish = new Date(publishDate);
        const today = new Date();
        const differenceInTime = today - publish;
        return Math.floor(differenceInTime / (1000 * 3600 * 24));
    }

    // Carregar dados do vídeo ao carregar a página
    loadVideoData();
});