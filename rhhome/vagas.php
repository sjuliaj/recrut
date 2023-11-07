<?php

include 'config.php';
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION["cod_cand"])) {
 // Exibir o nome do cliente logado
$codigo_cand = $_SESSION["cod_cand"];
// Consulta SQL para obter o nome do cliente
$sql = "SELECT * FROM tb_candidatos WHERE cod_cand = '$codigo_cand'";
$result = $conexao->query($sql);

if ($result->num_rows == 1) {
   $row = $result->fetch_assoc();
   $nome_cand = $row["cand_nome"];
}

   
}
else{
    header('Location: telalogin.php');
}
// Fechar conexão
$conexao->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas de Recrutamento</title>
    <link rel="stylesheet">
</head>
<style>
    
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
}

.vaga {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
}

.vaga h2 {
    margin-top: 0;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.btn:hover {
    background-color: #444;
}

    </style>
<body>
    <header>
        <h1>Vagas Disponíveis</h1>
    </header>
    
    <main>
        <section class="vaga">
            <h2>Desenvolvedor Web</h2>
            <p>Estamos buscando um desenvolvedor web experiente para se juntar à nossa equipe.</p>
            <a href="agendamento.php" class="btn">Candidatar-se</a>
        </section>

        <section class="vaga">
            <h2>Designer Gráfico</h2>
            <p>Procuramos um designer gráfico talentoso e criativo para colaborar em nossos projetos.</p>
            <a href="agendamento.php" class="btn">Candidatar-se</a>
        </section>
    </main>
</body>
</html>