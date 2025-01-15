<?php 
// Verifica se o usuário está autenticado
session_start();
if (!isset($_SESSION['token'])) {
    header("Location: login.html");
    exit;
}

include 'headset.php'; 
?>

<!-- Conteúdo principal da página -->
<main>
    <h2>Bem-vindo ao Net You Stream! 😏</h2>
    <p>Explore os melhores vídeos, crie e compartilhe seu conteúdo agora mesmo!</p>
    <a href="channel.html" class="button">Acessar Meu Canal</a>
</main>

<?php include 'footer.php'; ?>