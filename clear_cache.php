<?php
$cacheFile = 'cache/estatisticas.json';

// Verifica se o parâmetro de limpar cache foi passado
if (isset($_GET['clear_cache']) && $_GET['clear_cache'] == '1') {
    // Remove o arquivo de cache
    if (file_exists($cacheFile)) {
        unlink($cacheFile); // Remove o arquivo de cache
    }
    
    // Redireciona para a página de estatísticas
    header("Location: estatisticas.php");
    exit(); // Certifica-se de que o código após o redirecionamento não será executado
}

// Aqui vai o restante do código para carregar as estatísticas e cache
?>