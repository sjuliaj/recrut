<?php

include 'config.php';
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION["cod_cand"])) {
    // Exibir o nome do candidato logado
    $codigo_cand = $_SESSION["cod_cand"];

    // Consulta SQL para obter o nome do candidato
    $sql = "SELECT * FROM tb_candidatos WHERE cod_cand = '$codigo_cand'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome_cand = $row["cand_nome"];
    }

    // Consulta SQL para obter as vagas disponíveis
    $vagas_sql = "SELECT * FROM tb_vagas";
    $vagas_result = $conexao->query($vagas_sql);

    // Exibir as vagas disponíveis
    if ($vagas_result->num_rows > 0) {
        echo '<!DOCTYPE html>
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
                  <main>';
        while ($cod_vaga = $vagas_result->fetch_assoc()) {
            echo '<section class="vaga">
                      <h2>' . $cod_vaga["nome_empresa"] . '</h2>
                      <p>' . $cod_vaga["salario"] . '</p>
                      <p>' . $cod_vaga["tipo_vaga"] . '</p>
                      <p>' . $cod_vaga["descricao_vaga"] . '</p>
                      <p>' . $cod_vaga["modalidade"] . '</p>
                      <p>' . $cod_vaga["ativo"] . '</p>
                      <a href="sucessocandi.php" class="btn">Candidatar-se</a>
                  </section>';
        }
        echo '      </main>
              </body>
              </html>';
    } else {
        echo "Nenhuma vaga disponível no momento.";
    }
} else {
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
        <?php
        while ($cod_vaga = $vagas_result->fetch_assoc()) {
            ?>
            <section class="vaga">
                <h2>
                    <?php echo $cod_vaga["cod_empresa"] ?>
                </h2>
                <h2>
                    <?php $cod_vaga["nome_empresa"] ?>
                </h2>
                <p>
                    <?php $cod_vaga["salario"] ?>
                </p>
                <p>
                    <?php $cod_vaga["tipo_vaga"] ?>
                </p>
                <p>
                    <?php $cod_vaga["descricao_vaga"] ?>
                </p>
                <p>
                    <?php $cod_vaga["modalidade"] ?>
                </p>
                <p>
                    <?php $cod_vaga["ativo"] ?>
                </p>
                <a href="" class="btn">Candidatar-se</a>
            </section>';
        <?php } ?>
    </main>
</body>

</html>'