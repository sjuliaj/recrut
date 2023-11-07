<?php
// Configurações do banco de dados
$host = 'localhost'; // substitua pelo nome do host do seu banco de dados
$user = 'root'; // substitua pelo nome de usuário do seu banco de dados
$password = ''; // substitua pela senha do seu banco de dados
$database = 'recrutamento'; // substitua pelo nome do seu banco de dados

// Conexão com o banco de dados
$conexao = new mysqli($host, $user, $password, $database);
$pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    return $pdo;


if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}
else {
    echo 'Conexão com o banco de dados feita com sucesso!' . '</br>';
}
?>