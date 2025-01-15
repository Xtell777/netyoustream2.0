<form id="update-stats-form">
    <input type="hidden" name="user_id" value="1">
    <label>Inscritos:</label>
    <input type="number" name="subscribers" value="500000"><br>
    <label>Vídeos:</label>
    <input type="number" name="videos" value="10"><br>
    <label>Visualizações:</label>
    <input type="number" name="views" value="5000000"><br>
    <button type="submit">Atualizar Estatísticas</button>
</form>

<script>
document.getElementById("update-stats-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    fetch("save_channel.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("Estatísticas atualizadas com sucesso!");
        } else {
            alert("Erro ao atualizar estatísticas.");
        }
    })
    .catch(error => console.error("Erro ao enviar formulário:", error));
});
</script>