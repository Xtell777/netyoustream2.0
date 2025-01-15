// === Função de Aceitação de Termos ===
document.getElementById('accept-btn').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'none';  // Remove o pop-up ao clicar no botão "Concordo"
});

// === Função para Redirecionamento de Vídeo ===
function redirectToVideo(title, videoFile) {
    const baseUrl = "www.netyoustream.com/";  // Base da URL
    window.location.href = baseUrl + title + "/" + videoFile;  // Redireciona para o vídeo com título e arquivo
}

// === Função para Validar Página de Vídeo ===
function redirectToVideo(videoTitle, videoPage) {
    // Verifica se a página é válida (contém '.html')
    if (videoPage && videoPage.indexOf('.html') !== -1) {
        window.location.href = videoPage;  // Redireciona para a página do vídeo
    } else {
        console.error("Página do vídeo inválida: " + videoPage);  // Exibe erro se a página não for válida
    }
}

// === Função de Reconhecimento de Voz ===
function startRecognition() {
    document.getElementById("audio-element").play();  // Reproduz o áudio do elemento
    if (annyang) {  // Verifica se o annyang (API de reconhecimento de voz) está disponível
        annyang.setLanguage('pt-BR');  // Define o idioma para português
        annyang.addCommands({
            '*term': function(term) {  // Atribui um comando ao reconhecimento de voz
                document.getElementById('search-input').value = term;  // Coloca o termo reconhecido no campo de pesquisa
                search();  // Executa a função de busca
            }
        });
        annyang.start({ autoRestart: false, continuous: false })  // Inicia o reconhecimento de voz
            .catch(error => console.error('Erro ao iniciar o reconhecimento de voz:', error));
    }
}

// === Função de Debounce para Pesquisa ===
let debounceTimer;
function debounce(func, delay) {
    return function(...args) {
        clearTimeout(debounceTimer);  // Limpa o timer anterior
        debounceTimer = setTimeout(() => func.apply(this, args), delay);  // Inicia um novo timer para a função de pesquisa
    };
}

// === Função de Pesquisa ===
function search() {
    const query = document.getElementById('search-input').value.trim();  // Obtém o valor de pesquisa
    if (query) {
        document.getElementById('search-button').innerText = 'Buscando...';  // Modifica o texto do botão para "Buscando..."
        window.location.href = `search.html?q=${encodeURIComponent(query)}`;  // Redireciona para a página de resultados da pesquisa
    }
}

// === Evento de Filtragem de Resultados da Pesquisa ===
document.getElementById('search-input').addEventListener('input', debounce(function() {
    const filter = this.value.toUpperCase();  // Obtém o filtro em maiúsculas
    const ul = document.getElementById('myUL');  // Obtém a lista de resultados
    const li = ul.getElementsByTagName('li');  // Obtém os itens da lista
    let hasResults = false;  // Flag para verificar se existem resultados

    for (let i = 0; i < li.length; i++) {
        const a = li[i].getElementsByTagName('a')[0];  // Obtém o texto do item da lista
        const txtValue = a.textContent || a.innerText;  // Obtém o texto do link
        li[i].style.display = txtValue.toUpperCase().includes(filter) ? '' : 'none';  // Exibe ou oculta o item com base no filtro
        if (txtValue.toUpperCase().includes(filter)) {
            hasResults = true;  // Marca como "encontrado" se o item corresponder ao filtro
        }
    }

    // Exibe uma mensagem se não houver resultados
    const noResultsMessage = document.getElementById('no-results-message');
    if (!hasResults) {
        if (!noResultsMessage) {
            const message = document.createElement('p');
            message.id = 'no-results-message';
            message.textContent = 'Nenhum resultado encontrado.';
            ul.parentNode.insertBefore(message, ul.nextSibling);  // Adiciona a mensagem
        }
    } else if (noResultsMessage) {
        noResultsMessage.remove();  // Remove a mensagem se houver resultados
    }
}, 300));  // Delay de 300ms para o filtro de pesquisa

// === Função para Alternar o Menu ===
function toggleMenu() {
    var menuContent = document.getElementById('menuContent');  // Obtém o conteúdo do menu
    if (menuContent.style.display === 'block') {
        menuContent.style.display = 'none';  // Esconde o menu
    } else {
        menuContent.style.display = 'block';  // Exibe o menu
    }
}

// === Função para Fechar o Menu ao Clicar Fora ===
window.onclick = function(event) {
    var menuContent = document.getElementById('menuContent');
    if (event.target == menuContent) {
        menuContent.style.display = 'none';  // Fecha o menu se o clique for fora do menu
    }
}

// === Função para Iniciar o Chromecast ===
function castToChromecast() {
    if (chrome.cast && chrome.cast.isAvailable) {  // Verifica se o Chromecast está disponível
        var castConfig = new chrome.cast.CastConfig();
        var sessionRequest = new chrome.cast.SessionRequest(chrome.cast.media.DEFAULT_MEDIA_RECEIVER_APP_ID);
        var apiConfig = new chrome.cast.ApiConfig(sessionRequest, sessionListener, receiverListener);
        chrome.cast.initialize(apiConfig, onInitSuccess, onError);  // Inicializa o Chromecast
    } else {
        alert("Seu navegador não suporta o Chromecast.");
    }
}

// === Função de Sucesso na Inicialização do Chromecast ===
function onInitSuccess() {
    console.log('Chromecast inicializado com sucesso.');
    alert("Cast iniciado para o Chromecast!");
}

// === Função de Erro na Inicialização do Chromecast ===
function onError() {
    console.log('Erro ao inicializar o Chromecast.');
    alert("Erro ao inicializar o Chromecast.");
}

// === Função para Sessão do Chromecast ===
function sessionListener() {
    console.log('Sessão do Chromecast criada com sucesso.');
}

// === Função para Receptor do Chromecast ===
function receiverListener() {
    console.log('Receptor (Chromecast) disponível.');
}

// === Alerta Inicial do NET YOU STREAM ===
window.onload = function() {
    alert(`O NET YOU STREAM é uma plataforma inovadora de streaming...`);  // Mensagem de boas-vindas ao carregar a página
};