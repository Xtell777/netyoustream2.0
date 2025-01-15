// Atualiza as estatísticas do canal a cada 30 segundos
setInterval(() => {
    const userId = document.getElementById("channel-container").dataset.userId;
    
    fetch(`get_channel.php?user_id=${userId}`)
        .then(response => response.json())
        .then(data => {
            document.querySelector("#channel-stats .stat-item:nth-child(1)").innerHTML = `<i class="fas fa-user"></i> Inscritos: ${data.subscribers}`;
            document.querySelector("#channel-stats .stat-item:nth-child(2)").innerHTML = `<i class="fas fa-video"></i> Vídeos: ${data.videos}`;
            document.querySelector("#channel-stats .stat-item:nth-child(3)").innerHTML = `<i class="fas fa-eye"></i> Visualizações: ${data.views}`;
        })
        .catch(error => console.error("Erro ao atualizar estatísticas do canal:", error));
}, 30000); // Intervalo em milissegundos