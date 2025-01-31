<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Net You Stream</title>
    <!-- Vincular a biblioteca Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Adicione o link para o ícone do Chromecast -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
 <script src="channel.js"></script>
<script src="video.js"></script>
    <!-- Estilos para o botão Chromecast -->
<!-- Botão Chromecast -->
<div style="position: relative;">
  <button class="chromecast-button" onclick="castToChromecast()" style="position: absolute; top: 0; left: -5px; width: 100px; height: 57px; font-size: 35px; background-color: red;">
    <i class="mdi mdi-cast chromecast-icon"></i> 
  </button>
</div>

    <!-- HTML -->
<div class="menu-container">
  <div class="menu-icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
  <div class="menu-content" id="menuContent">
    <!-- Conteúdo do menu aqui -->
    <a href="index.html"><i class="fas fa-home"></i> Início</a>
    <a href="login.html"><i class="fas fa-sign-in-alt"></i> login</a>
    <a href="CriacaoDeConta.html"><i class="fas fa-user-plus"></i> conta</a>
    <a href="subscriptions.html"><i class="fas fa-bell"></i> Inscrições</a>
    <a href="settings.html"><i class="fas fa-cog"></i> Configurações</a>
    <a href="uploads.html"><i class="fas fa-upload"></i> Uploads</a>
    <a href="uploaded.html"><i class="fas fa-file-upload"></i> Arquivos Enviados</a>
    <a href="history.html"><i class="fas fa-history"></i> Histórico</a>
    <a href="channel.html"><i class="fas fa-tv"></i> Canal</a>
    <a href="notifications.html"><i class="fas fa-bell"></i> Notificações</a>
    <a class="vip" href="vip.html"><i class="fas fa-star"></i> VIP</a>

  </div>
</div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Estilos para os vídeos */
        .video-section {
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .video-title {
            font-size: 18px;
            color: #333;
            padding: 15px;
            margin: 0;
            border-bottom: 1px solid #ddd;
        }

        .video-rating {
            font-size: 14px;
            color: #666;
            padding: 15px;
            margin: 0;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* Proporção de 16:9 (para vídeos do YouTube) */
        }

        .video-container iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }


        /* Estilos para estatísticas do vídeo */
        .video-stats {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-top: 20px;
        }

        .video-stats p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }

        /* Estilos para a informação do vídeo */
        .video-info-container {
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .channel-info {
            display: flex;
            align-items: center;
        }

        .channel-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .channel-name {
            font-size: 20px;
            color: #333;
            margin: 0;
        }

        .subscribe-button {
            background-color: #c4302b;
            color: #fff;
            font-size: 14px;
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .subscribe-button:hover {
            background-color: #a32924;
        }

        /* Estilos para os comentários */
        .comments-section {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .comments-section h3 {
            font-size: 18px;
            color: #333;
            margin: 0 0 10px 0;
        }

        .comment-list {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .comment {
            display: flex;
            margin-bottom: 20px;
        }

        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .comment-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .comment-content {
            flex-grow: 1;
        }

        .comment-author {
            font-size: 16px;
            color: #333;
            margin: 0 0 5px 0;
        }

        .comment-text {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            resize: none;
        }

        .comment-button {
            background-color: #c4302b;
            color: #fff;
            font-size: 14px;
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .comment-button:hover {
            background-color: #a32924;
        }
.video-stats,
.interaction-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.video-stats p,
.interaction-buttons button {
    margin: 5px;
    padding: 8px 15px;
    border-radius: 20px;
}

.interaction-buttons button {
    cursor: pointer;
}

.interaction-buttons button:hover {
    background-color: #ddd;
}

.interaction-bar {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-top: 10px;
}

.interaction-button {
    background-color: transparent;
    border: none;
    font-size: 16px; /* Tamanho da fonte aumentado */
    font-weight: bold;
    cursor: pointer;
    padding: 10px 20px; /* Aumento do padding para aumentar o tamanho dos botões */
    margin-right: 10px;
    border-radius: 5px;
}

.interaction-button:hover {
    background-color: rgba(0, 0, 0, 0.1);
}

    
    
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #e62117;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        nav {
            background-color: #000;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin: 0 20px;
        }

        #search-bar {
            background-color: #444;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
        }

        #search-bar input[type="text"] {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        #search-bar button {
            background-color: #e62117;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        main {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .video-section {
            margin: 20px;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .interaction-bar {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            background-color: #000;
            padding: 10px;
        }

        .interaction-buttons {
            display: flex;
            gap: 10px;
        }

        .video-info-container {
            padding: 20px;
        }

        .video-title {
            font-size: 24px;
            margin: 10px 0;
        }

        
        .video-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .video-stats p {
            flex: 1;
            text-align: center;
        }

        .subscribe-button {
            background-color: #e62117;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .video-description {
            display: none;
            margin-top: 20px;
        }

        .interaction-bar {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .interaction-button {
            cursor: pointer;
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }


        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination button, .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            border: 1px solid #e62117;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            color: #e62117;
        }

        .pagination button:hover, .pagination a:hover {
            background-color: #e62117;
            color: #fff;
        }

        #prev-button, #next-button {
            background-color: #e62117;
            color: #fff;
            border: none;
        }
.comments-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #comment-list {
            /* Estilo da lista de comentários, se necessário */
        }

        #comment-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        #comment-text {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        #comment-form button {
            background-color: #e62117;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
   }

/* Adicione este trecho de código ao seu arquivo style.css ou em um arquivo separado */
.toggle-description {
    color: #e62117;
    cursor: pointer;
}

.toggle-comments {
    cursor: pointer;
    background-color: #eee;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.toggle-comments:hover {
    background-color: #ddd;
}

/* Estilo para a descrição do vídeo */
.video-description {
    display: none; /* Por padrão, a descrição fica oculta */
    margin-top: 20px; /* Espaçamento superior */
    padding: 10px; /* Espaçamento interno */
    background-color: #f5f5f5; /* Cor de fundo */
    border: 1px solid #ddd; /* Borda */
    border-radius: 5px; /* Borda arredondada */
}

.video-description p {
    margin: 0; /* Remover margem padrão do parágrafo */
}

.comments-section {
    margin-top: 20px;
}

.comments-section h3 {
    margin-bottom: 10px;
}

.comment-list {
    list-style: none;
    padding: 0;
}

.comment {
    display: flex;
    margin-bottom: 20px;
}

.comment-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-content {
    flex: 1;
}

.comment-author {
    font-weight: bold;
    margin: 0;
}

.comment-text {
    margin: 5px 0;
}

.comment-input {
    width: calc(100% - 20px);
    padding: 5px 10px;
    margin-bottom: 10px;
}

.comment-button {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    border: none;
    border-radius: 5px;
}

.comment-button:hover {
    background-color: #0056b3;
}
.comment-avatar {
    width: 40px; /* Largura desejada para a imagem */
    height: 40px; /* Altura desejada para a imagem */
    border-radius: 50%; /* Transforma a imagem em um círculo */
    overflow: hidden; /* Garante que a imagem não ultrapasse os limites do círculo */
    margin-right: 10px; /* Espaçamento à direita da imagem */
}

.comment-avatar img {
    width: 100%; /* Garante que a imagem preencha todo o espaço do círculo */
    height: auto; /* Mantém a proporção da imagem */
    display: block; /* Remove qualquer espaço extra ao redor da imagem */
}


/* Estilo para o botão "Mostrar Comentários" */
.toggle-comments {
    background-color: #ff0000;
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

.toggle-comments:hover {
    background-color: #cc0000;
}

/* Estilo para a seção de comentários */
.comments-section {
    display: none; /* Por padrão, a seção de comentários está oculta */
    margin-top: 20px;
}

.comments-section h3 {
    color: #ff0000;
}

.comment-list {
    margin-top: 10px;
}

.comment {
    border-bottom: 1px solid #cccccc;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.comment-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-content {
    margin-left: 50px;
}

.comment-author {
    font-weight: bold;
    color: #000000;
}

.comment-text {
    color: #333333;
}

.comment-form {
    margin-top: 20px;
}

.comment-input {
    width: calc(100% - 100px);
    padding: 8px;
    border: 1px solid #cccccc;
    border-radius: 4px;
}

.comment-button {
    width: 80px;
    padding: 8px;
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.comment-button:hover {
    background-color: #cc0000;
}


/* Estilo para a barra de interação */
.interaction-bar {
    margin-top: 10px;
}

/* Estilo para os botões de interação */
.interaction-button {
    display: inline-block;
    padding: 8px 16px;
    margin-right: 10px;
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.interaction-button:hover {
    background-color: #cc0000;
}

/* Estilo para o cabeçalho */
header {
    background-color: #ff0000; /* Vermelho */
    color: #ffffff; /* Branco */
    padding: 10px;
    text-align: center;
}

/* Estilo para o rodapé */
footer {
    background-color: #000000; /* Preto */
    color: #ffffff; /* Branco */
    padding: 10px;
    text-align: center;
}

/* Estilo para os links do rodapé */
footer a {
    color: #ffffff; /* Branco */
    text-decoration: none;
}

/* Estilo para os links do rodapé quando hover */
footer a:hover {
    text-decoration: underline;
}
/* Estilo para os botões adicionais */
.interaction-bar .interaction-button.small {
    font-size: 18px; /* Tamanho do emoji */
    padding: 6px 10px; /* Espaçamento interno dos botões */
    background-color: #ffcc00; /* Cor de fundo dos botões */
    color: #333; /* Cor do texto dos botões */
    border: none; /* Remover borda */
    border-radius: 4px; /* Borda arredondada */
    cursor: pointer; /* Cursor ao passar por cima */
    transition: background-color 0.3s; /* Transição suave da cor de fundo */
}

.interaction-bar .interaction-button.small:hover {
    background-color: #ffd633; /* Cor de fundo dos botões ao passar por cima */
}

.interaction-bar {
  background-color: #f2f2f2; /* Cor de fundo da barra */
  padding: 10px; /* Espaçamento interno */
  border-bottom: 1px solid #e1e1e1; /* Borda inferior */
}

.interaction-buttons {
  display: flex; /* Disposição flexível dos botões */
  justify-content: space-between; /* Espaçamento entre os botões */
}

.toggle-description,
.toggle-comments {
  cursor: pointer; /* Muda o cursor para indicar clicabilidade */
  padding: 5px 10px; /* Espaçamento interno */
  background-color: #4CAF50; /* Cor de fundo dos botões */
  color: white; /* Cor do texto */
  border-radius: 5px; /* Bordas arredondadas */
  margin: 0 5px; /* Margem externa */
}

.toggle-description:hover,
.toggle-comments:hover {
  background-color: #45a049; /* Cor de fundo ao passar o mouse */
}

/* CSS */
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.menu-container {
  background-color: #ff0000;
  color: #ffffff;
  padding: 10px;
  text-align: right; /* Alinhamento à direita */
}

.menu-icon {
  display: inline-block;
  width: 30px;
  height: 20px;
  cursor: pointer;
  position: relative;
}

.bar {
  width: 100%;
  height: 3px;
  background-color: #000000;
  margin: 5px 0;
}

.menu-content {
  display: none;
  background-color: #000000;
  padding: 10px;
}

.menu-content a {
  display: block;
  color: #ffffff;
  text-decoration: none;
  margin-bottom: 10px;
}

.menu-content a:hover {
  text-decoration: underline;
}

.active {
  display: block;
}
/* Estilo para a descrição do vídeo similar ao YouTube */
.video-description {
  background-color: #181818; /* Fundo escuro para o tema padrão do YouTube */
  color: #fff; /* Texto claro para melhor legibilidade */
  font-family: 'Roboto', sans-serif; /* Fonte padrão do YouTube */
  font-size: 14px; /* Tamanho de fonte similar ao do YouTube */
  line-height: 1.5; /* Espaçamento entre linhas */
  padding: 16px; /* Espaçamento interno */
  border-top: 1px solid #303030; /* Linha divisória no topo */
  max-width: 640px; /* Largura máxima para a descrição */
  margin: 0 auto; /* Centraliza a descrição */
}

/* Links dentro da descrição */
.video-description a {
  color: #3ea6ff; /* Cor azul para links, similar ao YouTube */
  text-decoration: none; /* Sem sublinhado nos links */
}

.video-description a:hover {
  text-decoration: underline; /* Sublinhado ao passar o mouse */
}

/* Parágrafos dentro da descrição */
.video-description p {
  margin-bottom: 12px; /* Espaçamento entre parágrafos */
}

/* Hashtags e menções */
.video-description .hashtag,
.video-description .mention {
  color: #bbb; /* Cor cinza para hashtags e menções */
  font-weight: bold; /* Negrito para destacar */
}

.interaction-button {
    text-decoration: none; /* Remove o sublinhado padrão dos links */
}

.video-stats {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-top: 20px;
        }

        .video-stats p {
            font-size: 12px;
            color: #666;
            margin: 5px 0;
        }
    
   

        /* Estilo para o menu de navegação */
        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Estilo para os ícones */
        .fas {
            margin-right: 5px;
        }

        /* Estilo para o conteúdo principal */
        main {
            padding: 20px;
        }

   
     nav {
    background-color: #333; /* Cor de fundo */
    padding: 10px; /* Espaçamento interno */
}

nav a {
    color: #fff; /* Cor do texto */
    text-decoration: none; /* Remover sublinhado dos links */
    display: inline-block; /* Exibir os links em linha */
    margin-right: 20px; /* Espaçamento entre os links */
}

nav a i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

.tema-card {
  background-color: #fff;
  border: 1px solid #bdc3c7;
  border-radius: 4px;
  padding: 10px; /* Reduzido de 20px para 10px */
  margin-bottom: 10px; /* Reduzido de 20px para 10px */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.tema-info {
  color: #7f8c8d;
  font-size: 14px; /* Reduzido de 16px para 8px */
  margin-bottom: 5px; /* Reduzido de 10px para 5px */
}
.tema-classificacao {
  color: #e74c3c;
  font-weight: bold;
  margin-bottom: 0;
}
        



.video-link {
    text-decoration: none; /* Remove o sublinhado */
    color: inherit; /* Herda a cor do texto */
}

.video-link:hover {
    opacity: 0.8; /* Diminui a opacidade ao passar o mouse */
}

.chromecast-button {
            background-color: #4285F4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .chromecast-button:hover {
            background-color: #357ae8;
        }

        .chromecast-icon {
            margin-right: 5px;
        }


        /* Estilos para o pop-up */
        #popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #popup-content {
            background-color: #fff;
            padding: 20px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #popup-content h2 {
            margin-top: 0;
        }

        #popup-content button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #popup-content button:hover {
            background-color: #0056b3;
        }

        #popup-content a {
            color: #007BFF;
            text-decoration: none;
        }

        #popup-content a:hover {
            text-decoration: underline;
        }

       /* Centralização e estilos básicos para o container */
#uploaded-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    margin: 20px auto;
    max-width: 800px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Título da seção com ícone */
#uploaded-container h2 {
    font-size: 24px;
    color: #ff0000; /* Cor do YouTube */
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    font-weight: bold;
}

/* Estilos para os ícones */
#uploaded-container h2 i {
    font-size: 24px;
    color: #ff0000; /* Cor do ícone igual ao título */
}

/* Seção dos arquivos enviados */
#uploaded-files {
    margin-top: 15px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

    #uploaded-files div {
        width: 120px;
        height: 120px;
    }
}

/* Estilos para a seção principal */
section {
    background-color: #f9f9f9; /* Cor de fundo clara */
    padding: 20px;
    margin: 20px auto;
    border-radius: 8px; /* Cantos arredondados */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
    max-width: 800px; /* Largura máxima */
}

/* Estilo do título da seção */
section h2 {
    color: #ff0000; /* Cor vermelha */
    font-size: 28px; /* Tamanho da fonte */
    text-align: center; /* Centralizar texto */
    margin-bottom: 20px; /* Margem inferior */
}

/* Estilo dos parágrafos */
section p {
    color: #333; /* Cor do texto */
    line-height: 1.6; /* Altura da linha */
    margin-bottom: 15px; /* Margem inferior */
}

/* Estilo das listas */
section ul {
    list-style-type: disc; /* Marcadores de lista */
    margin-left: 20px; /* Margem esquerda */
}

/* Estilo dos itens da lista */
section ul li {
    margin-bottom: 10px; /* Margem inferior para os itens da lista */
}

/* Estilo dos links */
section a {
    color: #ff0000; /* Cor dos links */
    text-decoration: none; /* Remover sublinhado */
}

section a:hover {
    text-decoration: underline; /* Sublinhado ao passar o mouse */
}
/* Define que a seção do vídeo ocupará 100% da largura */
.video-section {
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 0;
}

/* Para garantir que o iframe do vídeo preencha 100% da largura disponível */
.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* Mantém a proporção 16:9 */
    height: 0;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

/* Estilos adicionais para outros elementos */
.video-title {
    font-size: 1.5rem;
    text-align: center;
    margin-bottom: 10px;
}

/* Estilo para o link, se desejado */
.channel-info a {
    text-decoration: none; /* Remove sublinhado do link */
    color: inherit; /* Faz o link herdar a cor do texto */
    display: flex; /* Permite o alinhamento horizontal */
    align-items: center; /* Alinha o conteúdo ao centro */
}

.channel-info a:hover {
    text-decoration: underline; /* Adiciona sublinhado ao passar o mouse */
}

    </style>
</head>
<body>
<?php include('header.php'); ?>
<?php include('footer.php'); ?>

    <header>
        <!-- Cabeçalho do site -->
        <h1>Net You Stream</h1>
    </header>

    <nav>
        <!-- Menu de navegação -->
        <a href="index.html"><i class="fas fa-home"></i> Início</a>
        <a class="vip" href="vip.html"><i class="fas fa-star"></i> VIP</a>
        <a href="jogos.html"><i class="fas fa-gamepad"></i> Jogos</a>
        <a href="musica.html"><i class="fas fa-music"></i> Música</a>
        <a href="filmes.html"><i class="fas fa-film"></i> Filmes</a>
        <a href="live.html"><i class="fas fa-broadcast-tower"></i> Live</a>
        <a href="esporte.html"><i class="fas fa-football-ball"></i> Esporte</a>
        <a href="podcast.html"><i class="fas fa-podcast"></i> Podcast</a>
        <a href="noticias.html"><i class="fas fa-newspaper"></i> Notícias</a>
    </nav>
    <!-- Carregar a biblioteca de ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Carregar a biblioteca de ícones -->
<l<!-- Carregar o script para o reconhecimento de voz -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>

<!-- A barra de pesquisa -->
<div id="search-bar">
  <!-- O campo de texto para ativar o reconhecimento de voz -->
  <input type="text" id="search-input" placeholder="🔍 Pesquisar Net You Stream" aria-label="Campo de busca" />
  <!-- O botão de buscar que executa uma função JavaScript -->
  <button id="search-button" onclick="search()" aria-label="Buscar">Buscar</button>
  <!-- O botão de áudio que ativa o reconhecimento de voz -->
  <button id="audio-button" onclick="startRecognition()" aria-label="Ativar reconhecimento de voz">
    <i class="fas fa-microphone"></i>
  </button>
</div>

<!-- O elemento de áudio que contém o som do botão -->
<audio id="audio-element" src="button-sound.mp3"></audio>


</section>

    <main>
    
        <!-- Conteúdo principal do site -->

        <section>
            <h2>BEM-VINDO AO NET YOU STREAM!😏</h2>
        </section>

    <div id="popup">
        <div id="popup-content">
            <h2>Aviso Importante</h2>
            <p>Ao continuar navegando no site, você concorda com nossos <a href="termos.html" target="_blank">Termos de Serviço</a> e nossa <a href="privacidade.html" target="_blank">Política de Privacidade</a>.</p>
            <button id="accept-btn">Concordo</button>
        </div>
    </div>




<section class="video-section" id="video-1" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-gang-de-ponte-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "GANG DE PONTE" (Official Áudio)</h3>
    </a>
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 1:37min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>
    <div class="video-container">
        <a href="xtell-777-gang-de-ponte-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/atLVRfmh9Ps" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-1">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-1">1000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-1">1.234.567</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-1">1</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-1">123</span> comentários</p>
</div>

<section class="video-section" id="video-2" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-luxo-e-visao-2-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "LUXO E VISÃO 2" (Official Áudio)</h3>
    </a>
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 1:41min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>
    <div class="video-container">
        <a href="xtell-777-luxo-e-visao-2-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/-PrAH0-cbQY" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

.<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-1">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-1">1000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-1">1.234.567</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-1">1</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-1">123</span> comentários</p>
</div>

<!-- Mais vídeos com o mesmo padrão -->

<section class="video-section" id="video-3" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-na-mira-do-crime-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "NA MIRA DO CRIME" (Official Áudio)</h3>
    </a>
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 3:03min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>
    <div class="video-container">
        <a href="xtell-777-na-mira-do-crime-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/qPuQ7_rv1xE" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-1">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-1">1000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-1">1.234.567</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-1">1</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-1">123</span> comentários</p>
</div>


<section class="video-section" id="video-4" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-favela-de-ponte-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "FAVELA DE PONTE" (Official Áudio)</h3>
    </a>
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 2:40min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>
    <div class="video-container">
        <a href="xtell-777-favela-de-ponte-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/XJwfIT8b_5Q" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>
<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-4">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-4">1.000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-4">4.567.890</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-4">4</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-4">456</span> comentários</p>
</div>


<section class="video-section" id="video-5" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-o-rei-do-estado-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "O REI DO ESTADO" (Official Áudio)</h3>
    </a>

    <!-- Classificação etária -->
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 2:27min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>

    <div class="video-container">
        <a href="xtell-777-o-rei-do-estado-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/IyHusTrbgqM" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>
<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-5">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-5">1.000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-5">5.678.901</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-5">5</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-5">567</span> comentários</p>
</div>

<section class="video-section" id="video-6" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-ak-do-sport-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "AK DO SPORT" (Official Áudio)</h3>
    </a>

    <!-- Classificação etária -->
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 2:58min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>

    <div class="video-container">
        <a href="xtell-777-ak-do-sport-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/Y8C94myqaS0" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-6">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-6">1.000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-6">6.789.012</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-6">6</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-6">678</span> comentários</p>
</div>


<section class="video-section" id="video-7" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-mente-de-gangster-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "MENTE DE GANGSTER" (Official Áudio)</h3>
    </a>

    <!-- Classificação etária -->
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 2:02min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>

    <div class="video-container">
        <a href="xtell-777-mente-de-gangster-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/5pk2TxN6X8E" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-7">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-7">1.000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-7">7.890.123</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-7">7</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-7">789</span> comentários</p>
</div>



<section class="video-section" id="video-8" data-category="Música" data-age-rating="🔞+" data-user-id="1">
    <a href="xtell-777-mundo-a-girar-official-audio.html" class="video-link" target="_blank">
        <h3 class="video-title">XTELL 777 - "MUNDO A GIRAR" (Official Áudio)</h3>
    </a>

    <!-- Classificação etária -->
    <div class="content">
        <div class="tema-card">
            <div>
                <div class="tema-info">Música | 0h 4:00min</div>
            </div>
            <div class="tema-classificacao">Classificação: 🔞+</div>
        </div>
    </div>

    <div class="video-container">
        <a href="xtell-777-mundo-a-girar-official-audio.html" class="video-link" target="_blank">
            <iframe src="https://www.youtube.com/embed/AnY_VqxTTJI" frameborder="0" allowfullscreen></iframe>
        </a>
    </div>
</section>

<div class="video-info-container">
    <div class="channel-info">
        <a href="xtell-777.html" target="_blank" data-channel-id="1">
            <img src="https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a" 
                 alt="Imagem do canal XTELL 777" 
                 class="channel-image">
            <p class="channel-name">XTELL 777</p>
        </a>
    </div>
</div>

<div class="video-stats" id="stats-8">
    <p class="channel-subscribers"><i class="fa fa-users"></i> <span id="subscribers-8">1.000.000</span> inscritos</p>
    <p class="video-views"><i class="fa fa-eye"></i> <span id="views-8">8.901.234</span> views</p>
    <p class="video-publish-date"><i class="fa fa-calendar"></i> Publicado há <span id="days-since-publish-8">8</span> dias</p>
    <p class="video-comments"><i class="fa fa-comments"></i> <span id="comments-8">890</span> comentários</p>
</div>
<!-- Repita o mesmo padrão para cada vídeo adicional -->






    <script>
        // Quando o botão "Concordo" é clicado, remove o pop-up
        document.getElementById('accept-btn').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });
    </script>




<!-- Script JavaScript -->
<script>
function redirectToVideo(title, videoFile) {
    // Redireciona para a URL com o título do vídeo e .html
    const baseUrl = "www.netyoustream.com/";
    window.location.href = baseUrl + title + "/" + videoFile;
}
</script>







<script>
function redirectToVideo(videoTitle, videoPage) {
    // Checar se o vídeoPage está correto
    if (videoPage && videoPage.indexOf('.html') !== -1) {
        // Redirecionar para a página do vídeo
        window.location.href = videoPage;
    } else {
        console.error("Página do vídeo inválida: " + videoPage);
    }
}


</script>



   
   

    
    
<!-- O script que define as funções JavaScript -->
<script>
  // Função para iniciar o reconhecimento de voz
  function startRecognition() {
    document.getElementById("audio-element").play();
    if (annyang) {
      annyang.setLanguage('pt-BR');
      annyang.addCommands({
        '*term': function(term) {
          document.getElementById('search-input').value = term;
          search();
        }
      });
      annyang.start({ autoRestart: false, continuous: false })
        .catch(error => console.error('Erro ao iniciar o reconhecimento de voz:', error));
    }
  }

  // Debounce para a função de pesquisa
  let debounceTimer;
  function debounce(func, delay) {
    return function(...args) {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => func.apply(this, args), delay);
    };
  }

  // Função para realizar a busca
  function search() {
    const query = document.getElementById('search-input').value.trim();
    if (query) {
      // Mostrar um indicador de carregamento
      document.getElementById('search-button').innerText = 'Buscando...';
      window.location.href = `search.html?q=${encodeURIComponent(query)}`;
    }
  }

  // Adicionar evento de entrada para filtrar resultados
  document.getElementById('search-input').addEventListener('input', debounce(function() {
    const filter = this.value.toUpperCase();
    const ul = document.getElementById('myUL');
    const li = ul.getElementsByTagName('li');
    let hasResults = false;

    for (let i = 0; i < li.length; i++) {
      const a = li[i].getElementsByTagName('a')[0];
      const txtValue = a.textContent || a.innerText;
      li[i].style.display = txtValue.toUpperCase().includes(filter) ? '' : 'none';
      if (txtValue.toUpperCase().includes(filter)) {
        hasResults = true;
      }
    }

    // Exibir mensagem caso não haja resultados
    const noResultsMessage = document.getElementById('no-results-message');
    if (!hasResults) {
      if (!noResultsMessage) {
        const message = document.createElement('p');
        message.id = 'no-results-message';
        message.textContent = 'Nenhum resultado encontrado.';
        ul.parentNode.insertBefore(message, ul.nextSibling);
      }
    } else if (noResultsMessage) {
      noResultsMessage.remove();
    }
  }, 300)); // Debounce de 300ms
</script>




 
 
    
    



<script>
// JavaScript para alternar o menu
function toggleMenu() {
  var menuContent = document.getElementById('menuContent');
  if (menuContent.style.display === 'block') {
    menuContent.style.display = 'none';
  } else {
    menuContent.style.display = 'block';
  }
}

// Adiciona um ouvinte de evento para fechar o menu quando clicar fora dele
window.onclick = function(event) {
  var menuContent = document.getElementById('menuContent');
  if (event.target == menuContent) {
    menuContent.style.display = 'none';
  }
}


</script>
<!-- Adicione mais seções de vídeo conforme necessário, ajustando os IDs e chamadas de função -->

        
           
            </div>
<!-- Adicione esta parte do código JavaScript no final do seu arquivo -->



















<!-- Adicione este trecho de script no final do seu arquivo HTML, antes da tag de fechamento </body> -->


 






<script>
     // JavaScript
function toggleMenu() {
  var menu = document.getElementById("menuContent");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
}

     
      </script>


     



     




<script>
    function castToChromecast() {
        // Verifica se o navegador suporta a API do Chromecast
        if (chrome.cast && chrome.cast.isAvailable) {
            // Cria uma instância do objeto de configuração do Chromecast
            var castConfig = new chrome.cast.CastConfig();
            var sessionRequest = new chrome.cast.SessionRequest(chrome.cast.media.DEFAULT_MEDIA_RECEIVER_APP_ID);
            var apiConfig = new chrome.cast.ApiConfig(sessionRequest,
                sessionListener,
                receiverListener);

            // Inicia a inicialização do Chromecast
            chrome.cast.initialize(apiConfig, onInitSuccess, onError);
        } else {
            alert("Seu navegador não suporta o Chromecast.");
        }
    }

    // Função de callback para tratamento de sucesso na inicialização do Chromecast
    function onInitSuccess() {
        console.log('Chromecast inicializado com sucesso.');
        // Adicione o código aqui para iniciar o cast para o Chromecast
        // Por exemplo:
        alert("Cast iniciado para o Chromecast!");
    }

    // Função de callback para tratamento de erros na inicialização do Chromecast
    function onError() {
        console.log('Erro ao inicializar o Chromecast.');
        alert("Erro ao inicializar o Chromecast.");
    }

    // Função de callback para tratamento de alterações na sessão do Chromecast
    function sessionListener() {
        console.log('Sessão do Chromecast criada com sucesso.');
    }

    // Função de callback para tratamento de alterações no receptor (Chromecast)
    function receiverListener() {
        console.log('Receptor (Chromecast) disponível.');
    }
</script>



<script>
window.onload = function() {
    alert(`O NET YOU STREAM é uma plataforma inovadora de streaming, criada para oferecer uma ampla variedade de conteúdos tanto para profissionais quanto para amadores. Aqui, você encontra vídeos, áudios, fotos e muito mais, tudo organizado em diversas categorias para atender diferentes interesses e estilos de criação. Se você é um produtor de conteúdo ou simplesmente um fã de entretenimento, o NET YOU STREAM é o lugar perfeito para você.

No site, você tem fácil acesso às principais categorias de conteúdo, como:

- Início: A página principal, onde você pode explorar os conteúdos mais recentes e populares disponíveis na plataforma.
- VIP: Acesso exclusivo para assinantes VIP, com conteúdos premium e vantagens especiais.
- Jogos: Para os gamers de plantão, uma coleção diversificada de jogos para todos os gostos e estilos.
- Música: Uma biblioteca de áudios com as melhores produções musicais, tanto de artistas independentes quanto de grandes nomes.
- Filmes: Conteúdos cinematográficos variados, desde lançamentos até clássicos imperdíveis.
- Live: Assista a transmissões ao vivo de eventos, shows e streams diretamente na plataforma.
- Esporte: Fique por dentro de jogos ao vivo, análises e notícias do mundo dos esportes.
- Podcast: Ouça os podcasts mais diversos, cobrindo temas que vão de tecnologia a entretenimento.
- Notícias: Acompanhe as últimas novidades do Brasil e do mundo em diversas áreas, desde política até cultura.

A interface é simples e fácil de navegar, com ícones intuitivos que guiam você pelas seções. Basta clicar em qualquer uma das categorias listadas, como Música, Filmes, Live ou Esportes, para ter acesso ao conteúdo desejado.

Diversidade de Classificação Indicativa:

O site também apresenta conteúdos para todas as idades, organizados de acordo com a classificação indicativa, desde conteúdo Livre até 🔞+. Temos seções dedicadas ao público infantil e jovem, com programas adequados para 10, 12, 14 e 16 anos, além de áreas exclusivas para o público adulto.

Com NET YOU STREAM, você encontra tudo em um só lugar: entretenimento, informação e interação. Seja um produtor ou espectador, aproveite nossa plataforma para explorar o que há de melhor em vídeos, áudios, jogos, filmes e mais!`);
};


 
</script>



<header>
        <h1>Net You Stream</h1>
    </header>
    <footer>
      <!-- Rodapé do site -->
        <p>&copy; 2024 Net You Stream. Todos os direitos reservados.</p>
        <p><a href="termos.html">Termos de Serviço e Uso</a> | <a href="privacidade.html">Política de Privacidade</a></p>
    </footer>
    <!-- Adicione esta parte do código JavaScript no final do seu arquivo -->



           
</body>
</html>
   