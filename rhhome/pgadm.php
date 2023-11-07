<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>
    <style>
        body.bg-dark {
            background-color: #333; /* Cor de fundo escura para a página */
            color: white; /* Cor do texto para contraste */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white; /* Fundo branco para o quadro */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;

        }

        h2 {
            color: black;
        }

        h3 {
            color: black;
        }
        .options {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        button {
            padding: 5px 10px;
            margin: 5px;
            border-radius: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-dark">
    <div>
        <h1>Página do Administrador</h1>
        <div class="container">
            <div class="options">
                <h2 style="text-align: center;">Operações disponíveis:</h2>
                <h3>Candidatos</h3>
                <button id="consulta">Consulta</button>
                <h3>Empresas</h3>
                <a href="crude2.php"><button>Consulta</button></a>
            </div>
        </div>
    </div>

    <script>
        const createBtn = document.getElementById("consulta");

        createBtn.addEventListener("click", () => {
            // Aqui você pode redirecionar para a página de criação
            window.location.href = "crude.php";
        });
    </script>
</body>
</html>
