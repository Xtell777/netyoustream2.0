<?php
// Exemplo de dados dinâmicos (geralmente você recuperaria esses dados do banco de dados)
$titulo = "Nome do Vídeo Exemplo"; // Recuperado do banco de dados
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo))); // Gera um slug amigável
$video_id = "atLVRfmh9Ps"; // ID do vídeo no YouTube (poderia ser dinâmico também)
$canal_nome = "XTELL 777";
$canal_imagem = "https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a";
$subscribers = 500000; // Exemplo de inscritos
$views = 1234567; // Exemplo de views
$publish_date = "2023-10-01"; // Exemplo de data de publicação
$comments = 123; // Exemplo de comentários
$duracao = "0h 1:37min"; // Exemplo de duração
$age_rating = "🔞+"; // Classificação etária
?>

<section class="video-section" id="video-1" data-category="Música" data-age-rating="<?php echo $age_rating; ?>">
    <!-- Link para o vídeo com o slug gerado -->
    <a href="http://www.netyoustream.com/xtell-777/<?php echo $slug; ?>" class="video-link" target="_blank">
        <h3 class="video-title"><?php echo htmlspecialchars($titulo); ?></h3>
    </a>
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info"><?php echo "Música | $duracao"; ?></div>
            </div>
            <div class="tema-classificacao">Classificação: <?php echo $age_rating; ?></div>
        </div>
    </div>
    <div class="video-container">
        <a href="http://www.netyoustream.com/xtell-777/<?php echo $slug; ?>" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="channel.html">
            <img src="<?php echo $canal_imagem; ?>" alt="Imagem do canal <?php echo htmlspecialchars($canal_nome); ?>" class="channel-image">
            <p class="channel-name"><?php echo $canal_nome; ?></p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-1">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-1"><?php echo number_format($subscribers); ?></span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-1"><?php echo number_format($views); ?></span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-1"><?php 
        // Calculando a diferença entre a data de publicação e a data atual
        $publish_timestamp = strtotime($publish_date);
        $current_timestamp = time();
        $days_since_publish = floor(($current_timestamp - $publish_timestamp) / (60 * 60 * 24));
        echo $days_since_publish; 
    ?></span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-1"><?php echo number_format($comments); ?></span> comentários</p>
</div>