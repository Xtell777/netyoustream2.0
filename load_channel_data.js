document.addEventListener("DOMContentLoaded", function() {
    const userId = document.getElementById("channel-container").dataset.userId;

    // Carregar dados do canal
    fetch(`get_channel.php?user_id=${userId}`)
        .then(response => response.json())
        .then(data => {
            document.querySelector(".channel-image").src = data.image_url;
            document.querySelector("#channel-info h2").textContent = data.name;
            document.querySelector("#channel-description p").textContent = data.description;
            document.querySelector("#channel-stats .stat-item:nth-child(1)").innerHTML = `<i class="fas fa-user"></i> Inscritos: ${data.subscribers}`;
            document.querySelector("#channel-stats .stat-item:nth-child(2)").innerHTML = `<i class="fas fa-video"></i> Vídeos: ${data.videos}`;
            document.querySelector("#channel-stats .stat-item:nth-child(3)").innerHTML = `<i class="fas fa-eye"></i> Visualizações: ${data.views}`;
        })
        .catch(error => console.error("Erro ao carregar dados do canal:", error));
});