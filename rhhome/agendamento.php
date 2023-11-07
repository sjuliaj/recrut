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
    else {
        header('Location: telalogin.php');
    }

    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Sistema de Agendamento</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f5f5f5;
            }

            h1 {
                color: #333;
            }

            form {
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 20px;
                border-radius: 5px;
            }

            label {
                font-weight: bold;
                display: block;
                margin-bottom: 10px;
                color: #555;
            }

            input[type="text"],
            input[type="date"],
            input[type="time"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 3px;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            h2 {
                margin-top: 20px;
                color: #333;
            }

            ul {
                list-style-type: none;
                padding: 0;
            }

            li {
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>

    </body>

    </html>


    <body>
        <h1>Agendar Entrevista</h1>

        <form method="POST" action="agendamento.php">
            <label for="candnome">Nome do Candidato:</label>
            <div>
                <?php echo $nome_cand; ?>
            </div><br>

            <label for="data">Data da Entrevista:</label>
            <input type="date" id="data" name="data" required max="9999-12-31"><br><br>

            <label for="hora">Hora da Entrevista:</label>
            <input type="time" id="hora" name="hora" required><br>


            <style>
                label {
                    margin-bottom: 10px;
                }


                select {
                    margin-bottom: 10px;
                }
            </style>

            <form>
                <label for="empresa">Selecione a Empresa de Interesse:</label>


                <select name="empresa" required>



                    <option value="">Empresas</option>


                    <?php
                    include 'config.php';



                    // Consulta para obter os tipos de serviço
                    $query_tipos_servico = "SELECT * FROM tb_empresas";
                    $result_tipos_servico = $conexao->query($query_tipos_servico);


                    while ($row_tipo_servico = $result_tipos_servico->fetch_assoc()) {
                        echo '<option value="' . $row_tipo_servico["nome_emp"] . '">' . $row_tipo_servico["nome_emp"] . '</option>';
                    }
                    ?>
                </select><br>

                <label for="tipovaga">Selecione o formato da Vaga de seu Interesse:</label>
                <select id="tipovaga" name="tipovaga" required>
                    <option value="Aprendiz">Aprendiz</option>
                    <option value="Efetivo">Efetivo</option>
                </select><br>

                <a href="index.php"><button class="button" type="submit">Cadastre-se</button></a>
            </form>


            <h2>Histórico de Entrevistas Agendadas anteriormente:</h2>
            <ul id="listaEntrevistas">
                </ul>
                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST["data"];
        $hora = $_POST["hora"];
        $empresa = $_POST["empresa"];
        $tipovaga = $_POST["tipovaga"];

        // Verificar se os valores do POST estão definidos
        if (isset($data) && isset($hora) && isset($empresa) && isset($tipovaga)) {
            echo 'Data: ' . $data . '</br>';
            echo 'Hora: ' . $hora . '</br>';
            echo 'Empresa: ' . $empresa . '</br>';
            echo 'Tipo Vaga: ' . $tipovaga . '</br';

            // Conectar ao banco de dados (substitua pelos seus detalhes de conexão)
            $conexao = new mysqli("localhost", "usuário", "senha", "banco");

            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            $sql2 = "SELECT cod_empresa FROM tb_empresas WHERE nome_emp = '$empresa'";
            $result2 = $conexao->query($sql2);

            if ($result2->num_rows == 1) {
                $row2 = $result2->fetch_assoc();
                $cod_empresa = $row2["cod_empresa"];

                $sql1 = "INSERT INTO tb_agendas (hora, data, cod_cand, cod_empresa, tipo_vaga) 
                    VALUES ('$hora', '$data', '$codigo_cand', '$cod_empresa', '$tipovaga')";

                if ($conexao->query($sql1) === TRUE) {
                    echo "Inserção bem-sucedida!";
                } else {
                    echo "Erro na inserção: " . $conexao->error;
                }
            } else {
                echo "Empresa não encontrada.";
            }

            $conexao->close(); // Feche a conexão com o banco de dados quando não precisar mais dela.
        } else {
            echo "Campos obrigatórios não preenchidos.";
        }
    }
    ?>


    </body>

    </html>

    </ul>

    </body>

    </html>