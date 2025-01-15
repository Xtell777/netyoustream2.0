document.addEventListener("DOMContentLoaded", function() {
    const userId = document.getElementById("channel-container").dataset.userId;

    // Função para carregar dados do canal
    function loadChannelData() {
        fetch(`get_channel.php?user_id=${userId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'error') {
                    document.querySelector(".channel-image").src = data.image_url;
                    document.querySelector("#channel-info h2").textContent = data.name;
                    document.querySelector("#channel-description p").textContent = data.description;
                    document.querySelector("#channel-stats .stat-item:nth-child(1)").innerHTML = `<i class="fas fa-user"></i> Inscritos: ${data.subscribers}`;
                    document.querySelector("#channel-stats .stat-item:nth-child(2)").innerHTML = `<i class="fas fa-video"></i> Vídeos: ${data.videos}`;
                    document.querySelector("#channel-stats .stat-item:nth-child(3)").innerHTML = `<i class="fas fa-eye"></i> Visualizações: ${data.views}`;
                } else {
                    console.error("Erro ao carregar dados do canal:", data.message);
                }
            })
            .catch(error => console.error("Erro ao carregar dados do canal:", error));
    }

    // Função para atualizar dados do canal
    function updateChannelStats(subscribers, videos, views) {
        fetch("save_channel.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                user_id: userId,
                name: "XTELL 777",
                description: "Nova descrição aqui",
                image_url: "https://caminho-da-imagem.jpg",
                subscribers: subscribers,
                videos: videos,
                views: views
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadChannelData();
            } else {
                console.error("Erro ao atualizar dados do canal:", data.message);
            }
        })
        .catch(error => console.error("Erro ao atualizar dados do canal:", error));
    }

    // Carregar dados ao carregar a página
    loadChannelData();
});