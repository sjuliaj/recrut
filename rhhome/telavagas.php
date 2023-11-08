<?php
include 'config.php'; // Certifique-se de que o arquivo 'config.php' está corretamente configurado
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION["cod_empresa"])) {
  // Exibir o nome do candidato logado
$codigo_emp = $_SESSION["cod_empresa"];

// Consulta SQL para obter o nome do candidato
$sql = "SELECT * FROM tb_empresas WHERE cod_empresa = '$codigo_emp'";
$result = $conexao->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome_emp = $row["nome_emp"];
}

$mensagensErro = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $empresa = mysqli_real_escape_string($conexao, $_POST['empresa']); // Obtém o código da empresa do formulário
  $salario = mysqli_real_escape_string($conexao, $_POST['salario']);
  $tipo_vaga = mysqli_real_escape_string($conexao, $_POST['tipo_vaga']);
  $descricao_vaga = mysqli_real_escape_string($conexao, $_POST['descricao_vaga']);
  $modalidade = mysqli_real_escape_string($conexao, $_POST['modalidade']);
  


  // Valide os erros de formulário (adicionar validações conforme necessário)

  // Consulta para inserir os dados da vaga no banco de dados
  $sql = "INSERT INTO tb_vagas (cod_empresa, salario, tipo_vaga, descricao_vaga, modalidade, nome_empresa) 
          VALUES ('$codigo_emp', '$salario', '$tipo_vaga', '$descricao_vaga', '$modalidade', '$empresa')";

  if (mysqli_query($conexao, $sql)) {
    $sucesso = "Cadastro da vaga realizado com sucesso!";
    header('Location: sucessodevaga.php'); // Redirecione para a página de sucesso
  } else {
    $mensagensErro[] = "Erro na inserção da vaga: " . mysqli_error($conexao);
  }
}
}
else{
  header('Location: teladeescolhalogin.php');
}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Cadastre uma vaga</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 50px;
      background-color: #DCDCDC;
      font-family: 'Jost', sans-serif;
    }

    form {
      width: 400px;
      padding: px; 
      background-color: #444; 
      border: 2px solid #1f497d;
      border-radius: 5px;
      padding-left: 20px;
      padding-right: 25px;
      padding-bottom: 25px;
      
    }

    h1 {
      text-align: center;
      color: #DCDCDC; 
    }

    label {
      display: block;
      margin-bottom: 5px; /* Reduz o espaço inferior dos rótulos */
      color: #DCDCDC; /* Cor dos rótulos em azul */
    }

    select{
      width: 103%;
      padding: 5px;
      font-size: 16px;
      border-radius: 3px;
      border: 1px solid #6e77ac;
      background-color: #eee; /* Altere a cor de fundo dos campos de entrada para cinza claro */
      color: #000000; /* Altere a cor do texto nos campos de entrada para preto */
      margin-bottom: 10px; /* Reduz o espaço inferior dos campos */
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 5px;
      font-size: 16px;
      border-radius: 3px;
      border: 1px solid #6e77ac;
      background-color: #eee; /* Altere a cor de fundo dos campos de entrada para cinza claro */
      color: #000000; /* Altere a cor do texto nos campos de entrada para preto */
      margin-bottom: 10px; /* Reduz o espaço inferior dos campos */
    }

    button[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      color: #fff; /* Cor do texto do botão em branco */
      background-color: #000000;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px; /* Reduz o espaço acima do botão */  
    }

    button[type="submit"]:hover {
      background-color:#000000;
    }

    div {
    position: relative;
  }

  div i {
    position: absolute;
    top: 60%;
    transform: translateY(-45%);
    right: 5px;
    cursor: pointer;
    font-size: 20px;
  }

  input[type="password"] {
    padding-right: 6px;
  }

  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
      $('#telefone').mask('(00) 00000-0000'); // máscaras do código 
    });

  </script>
</head>

<body>
  <form action="telavagas.php" method="POST">
    <h1>Cadastre uma Vaga</h1>

    <label for="empresa">Empresa:</label>
    <input type="text" name="empresa" value="<?php echo $nome_emp?>" readonly>

    <label for="salario">Salário:</label>
    <input type="text" id="salario" name="salario" required>

    <label for="tipo_vaga">Tipo de Vaga:</label>
    <select id="tipo_vaga" name="tipo_vaga" required>
      <option value="A">A - Tempo Integral</option>
      <option value="E">E - Estágio</option>
    </select>

    <label for="descricao_vaga">Descrição da Vaga:</label>
    <textarea id="descricao_vaga" name="descricao_vaga" rows="4" required></textarea>

    <label for="modalidade">Modalidade da Vaga:</label>
    <select id="modalidade" name="modalidade" required>
      <option value="Presencial">Presencial</option>
      <option value="Online">Online</option>
    </select>


    <!-- Estiliza onde mostra as mensagens de erro -->
    <div>
      <!-- Mostra cada mensagem de erro -->
      <?php foreach ($mensagensErro as $mensagem): ?>
        <!-- Mostra as mensagens de erro -->
        <div>
          <?php echo $mensagem; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <button class="button" type="submit">Cadastrar Vaga</button>
    <br>
  </form>
</body>

</html>