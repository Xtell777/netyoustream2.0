function updateChannelStats(subscribers, videos, views) {
    const userId = document.getElementById("channel-container").dataset.userId;

    fetch("save_channel.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
            user_id: userId,
            name: "XTELL 777", // Pode ser dinâmico
            description: "Nova descrição aqui", // Pode ser dinâmico
            image_url: "https://caminho-da-imagem.jpg", // Pode ser dinâmico
            subscribers: subscribers,
            videos: videos,
            views: views
        })
    })
    .then(response => response.json())
    .then(data => console.log("Dados atualizados com sucesso:", data))
    .catch(error => console.error("Erro ao atualizar dados do canal:", error));
}