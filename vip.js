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

// JavaScript
function toggleMenu() {
  var menu = document.getElementById("menuContent");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
}
