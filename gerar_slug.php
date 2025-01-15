<?php
function gerarSlug($titulo) {
    $slug = strtolower(trim($titulo)); // Converte para minúsculas e remove espaços em branco
    $slug = str_replace('"', '', $slug); // Remove aspas
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug); // Substitui espaços e caracteres especiais por '-'
    return $slug;
}

$titulo = 'XTELL 777 - "GANG DE PONTE" (Official Áudio)';
$slug = gerarSlug($titulo); // Exemplo: "xtell-777-gang-de-ponte-official-audio"
?>

<a href="videos/<?php echo $slug; ?>.html" class="video-link" target="_blank">
    <h3 class="video-title"><?php echo htmlspecialchars($titulo); ?></h3>
</a>