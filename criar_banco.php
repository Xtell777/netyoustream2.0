<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777"; // Substitua pelo seu usuário do banco
$password = "Tubarao777"; // Substitua pela sua senha
$dbname = "u845457687_net_you_stream"; // Substitua pelo nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criando o banco de dados, se não existir
$sql = "CREATE DATABASE IF NOT EXISTS net_you_stream";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado ou já existe com sucesso.\n";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Selecionando o banco de dados
$conn->select_db($dbname);

// Criação das tabelas

// Tabela de usuários
$sql_usuarios = "
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_usuarios) === TRUE) {
    echo "Tabela 'usuarios' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'usuarios': " . $conn->error;
}

// Tabela de vídeos
$sql_videos = "
CREATE TABLE IF NOT EXISTS videos (
    id_video INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    url_video VARCHAR(255) NOT NULL,
    categoria VARCHAR(100),
    duracao TIME,
    classificacao VARCHAR(10),
    usuario_id INT,
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    visualizacoes INT DEFAULT 0,
    comentarios INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
)";

if ($conn->query($sql_videos) === TRUE) {
    echo "Tabela 'videos' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'videos': " . $conn->error;
}

// Tabela de comentários
$sql_comentarios = "
CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    comentario_texto TEXT,
    usuario_id INT,
    video_id INT,
    data_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (video_id) REFERENCES videos(id_video)
)";

if ($conn->query($sql_comentarios) === TRUE) {
    echo "Tabela 'comentarios' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'comentarios': " . $conn->error;
}

// Tabela de inscrições
$sql_inscricoes = "
CREATE TABLE IF NOT EXISTS inscricoes (
    id_inscricao INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    canal_id INT,
    data_inscricao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (canal_id) REFERENCES usuarios(id_usuario)
)";

if ($conn->query($sql_inscricoes) === TRUE) {
    echo "Tabela 'inscricoes' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'inscricoes': " . $conn->error;
}

// Tabela de notificações
$sql_notificacoes = "
CREATE TABLE IF NOT EXISTS notificacoes (
    id_notificacao INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    tipo VARCHAR(50),
    mensagem TEXT,
    data_notificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lida BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
)";

if ($conn->query($sql_notificacoes) === TRUE) {
    echo "Tabela 'notificacoes' criada com sucesso.\n";
} else {
    echo "Erro ao criar tabela 'notificacoes': " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>