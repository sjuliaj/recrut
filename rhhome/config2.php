<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'recrutamento';

// Conexão com o banco de dados usando MySQLi
$conexao = new mysqli($host, $user, $password, $database);

if ($conexao->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $conexao->connect_error);
} else {
    echo 'Conexão com o banco de dados feita com sucesso!' . '<br>';
}

?>