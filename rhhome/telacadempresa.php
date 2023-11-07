<?php
include 'config2.php'; // Certifique-se de que o arquivo 'config.php' está corretamente configurado
include 'validarcadempresa.php';

// Cria uma variável para armazenar mensagens de erro
$mensagensErro = array();
function removeSpecialChars($str) {
  // Remove todos os caracteres não numéricos (exceto números)
  $cleanedStr = preg_replace('/[^0-9]/', '', $str);
  return $cleanedStr;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtenha os dados do formulário e escape-os para evitar injeção de SQL
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
  $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
  $telefoneLimpo = removeSpecialChars($telefone);
  $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
  $cnpjLimpo = removeSpecialChars($cnpj);
  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $senha = md5($_POST ['senha']); // Certifique-se de usar hash de senha seguro (não MD5)
  $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);

  // Valida os erros de formulário
  if (empty($mensagensErro)) {
    // Consulta para obter o código da cidade
    $sql = "SELECT cod_cidade FROM tb_cidades WHERE nome_cid = '$cidade'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $row = mysqli_fetch_assoc($resultado);

      if ($row) {
        $cod_cidade = $row['cod_cidade'];

        // Consulta para inserir os dados da empresa no banco de dados
        $sql1 = "INSERT INTO tb_empresas(nome_emp, endereco_emp, telefone_empresa, cnpj_emp, email_emp, senha, cod_cidade) 
                 VALUES ('$nome', '$endereco', '$telefoneLimpo', '$cnpjLimpo', '$email', '$senha', $cod_cidade)";

        if (mysqli_query($conexao, $sql1)) {
          $sucesso = "Cadastro realizado com sucesso!";
          header('Location: telaloginemp.php');
        } else {
          $mensagensErro[] = "Erro na inserção da empresa: " . mysqli_error($conexao);
        }
      } else {
        $mensagensErro[] = "Cidade não encontrada no banco de dados.";
      }
    } else {
      $mensagensErro[] = "Erro na consulta de cidade: " . mysqli_error($conexao);
    }
  }
}
?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Formulário de Cadastro</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #DCDCDC; 
      height: 100vh; 
      font-family: 'Jost', sans-serif;
      padding-top: 50px;
    }

    form {
      width: 400px;
      padding: px; 
      background-color: #444; 
      border: 2px solid #1f497d;
      border-radius: 5px;
      padding-left: 20px;
      padding-right: 25px;
      
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
  <form action="telacadempresa.php" method="POST">
    <h1>Cadastre-se</h1>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="endereco">Endereço:</label>
    <input type="text" id="Endereco" name="endereco" required>
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
      
    <label for="cnpj">CNPJ:</label>
    <input type="text" id="cnpj" name="cnpj" required>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required>

    <label for="cidade">Cidade:</label>
    <select id="cidade" name="cidade" required>

      <option value="Cascavel">Cascavel</option>
    </select>

   <div>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    
    </div>

    <div>
    <label for="Confirmar-senha">Confirmar senha: </label>
    <input type="password" id=" Confirmar-senha" name="confirmarsenha" required>
    

   </div>
  
    
  

    <!--Estiliza onde mostra as mensagens de erro-->
    <div>

      <!--Mostra cada mensagem de erro-->
      <?php foreach ($mensagensErro as $mensagem): ?>

        <!--Mostra as mensagens de erro-->
        <div>
          <?php echo $mensagem; ?>
        </div>

        <!--Fim da estilização-->
      <?php endforeach; ?>
    </div>

    <a><button class="button" type="submit">Cadastre-se</button></a>
  </form>
        
      
</body>

</html>