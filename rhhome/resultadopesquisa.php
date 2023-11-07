<?php
// Conectar ao banco de dados (substitua com suas informações de conexão)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'recrutamento';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recuperar os critérios de pesquisa do formulário
$modalidade = $_POST['modalidade'];
$tipo_vaga = $_POST['tipo_vaga'];

// Consulta SQL para pesquisar vagas com base nos critérios
$sql = "SELECT * FROM vagas WHERE modalidade LIKE '%$modalidade%' AND tipo_vaga LIKE '%$tipo_vaga%'";

$result = $conn->query($sql);

// Exibir os resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Modalidade: " . $row['modalidade'] . "<br>";
        echo "Tipo: " . $row['tipo'] . "<br>";
        echo "Descrição: " . $row['descricao'] . "<br><br>";
    }
} else {
    echo "Nenhuma vaga encontrada.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>