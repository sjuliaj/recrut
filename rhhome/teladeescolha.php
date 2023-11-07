<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Escolha</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #333;
        }
        
        .button {
            display: block;
            width: 200px;
            height: 100px;
            text-align: center;
            line-height: 100px;
            background-color: #222;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin: 10px;
            border: 2px solid #fff;
            border-radius: 10px;
        }

        .button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <a href="telacadempresa.php" class="button"> Empresa</a>
    <a href="teladecadastro.php" class="button">Candidato</a>
</body>
</html>
