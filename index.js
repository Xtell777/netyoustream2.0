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
