<script>
    fetch('cache/estatisticas.json')
        .then(response => response.json())
        .then(data => {
            // Manipule os dados para exibir as estatísticas na página
            console.log(data); // Exemplo de exibição no console
        })
        .catch(error => console.error('Erro ao carregar estatísticas:', error));
</script>