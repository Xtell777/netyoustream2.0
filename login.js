<script>
    async function handleLogin(event) {
        event.preventDefault(); 
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const errorMessage = document.getElementById('error-message');
        errorMessage.textContent = "";

        try {
            const response = await fetch("http://www.netyoustream.com/login_api.php", {  // URL do script PHP para autenticação
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ username: username, password: password })
            });

            const data = await response.json();

            if (response.ok && data.token) {  // Verifica se há um token na resposta
                localStorage.setItem("token", data.token);
                localStorage.setItem("username", username);
                window.location.href = "homepage.html";  // Redireciona para a página principal após login bem-sucedido
            } else {
                errorMessage.textContent = data.message || "Erro ao fazer login. Verifique suas credenciais.";
            }
        } catch (error) {
            // Exibe a mensagem de erro mais detalhada
            if (error instanceof TypeError) {
                errorMessage.textContent = "Erro de conexão. Verifique sua internet ou tente novamente mais tarde.";
            } else {
                errorMessage.textContent = "Erro inesperado. Tente novamente.";
            }
        }
    }
</script>