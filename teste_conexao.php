<?php
// Inclui o arquivo de conexão
include 'db.php';

// Testar a conexão
try {
    // Verifica se a conexão é bem-sucedida
    if ($pdo) {
        echo "Conexão bem-sucedida ao banco de dados!";
    }
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso a conexão falhe
    echo "Erro na conexão ao banco de dados: " . $e->getMessage();
}
?>