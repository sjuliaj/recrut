<?php
include 'config.php';
include 'validartelacadastro.php';

$mensagensErro = array();

function removeSpecialChars($str) {
  // Remove todos os caracteres não numéricos (exceto números)
  $cleanedStr = preg_replace('/[^0-9]/', '', $str);
  return $cleanedStr;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nomecompleto'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $cpfLimpo = removeSpecialChars($cpf);
  $telefone = $_POST['telefone'];
  $telefoneLimpo = removeSpecialChars($telefone);
  $genero = $_POST['genero'];
  $datanascimento = $_POST['datanascimento'];
  $senha = md5($_POST['senha']); 

  
  $cidade = $_POST['cidade'];

  // Valide os campos, por exemplo, você pode adicionar validações de e-mail e CPF aqui

  // Continue com a inserção dos dados após as verificações
  $sql = "SELECT cod_cidade FROM tb_cidades WHERE nome_cid = '$cidade'";
  $resultado = mysqli_query($conexao, $sql);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);

    if ($row) {
      $cod_cidade = $row['cod_cidade'];

      $sql1 = "INSERT INTO tb_candidatos(cand_nome, cand_cpf, cand_email, dt_nasc, senha, sexo, cand_tel, cod_cidade) 
          VALUES ('$nome', '$cpfLimpo', '$email', '$datanascimento', '$senha', '$genero', '$telefoneLimpo', '$cod_cidade')";

      if (mysqli_query($conexao, $sql1)) {
        $ultimoCodigoInserido = mysqli_insert_id($conexao);
        $sucesso = "Cadastro realizado com sucesso!";
        header('Location: telalogin.php');
      }
    }
  }
}
?>


<!DOCTYPE html>
<html>

<head>
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
    input[type="date"],
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


    
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#cpf').mask('000.000.000-00', { reverse: true });
      $('#telefone').mask('(00) 00000-0000');
    });

  </script>
</head>

<body>
  <form action="teladecadastro.php" method="POST">
    <h1>Cadastre-se</h1>

    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nomecompleto" required>

    <label for="email">Email:</label>
    <input type="email" id="Email" name="email" required>

    <label>CPF</label>
        <input type="text" id="cpf" name="cpf"  class="cpf" placeholder="">

        <label>Telefone</label>
        <input type="text" id="telefone" name="telefone" required class="telefoneLimpo" placeholder="">

    <label for="cidade">Cidade:</label>
    <select id="cidade" name="cidade" required>
      <option value="Cascavel">Cascavel</option>
    </select>

    <label for="genero">Gênero:</label>
    <select id="genero" name="genero" required>
      <option value="Feminino">Feminino</option>
      <option value="Masculino">Masculino</option>
      <option value="Outro">Outro</option>
    </select>

    <label for="dataNascimento">Data de Nascimento:</label>
    <input type="date" id="dataNascimento" name="datanascimento" required max="9999-12-31">

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <label for="Confirmar-senha">Confirmar senha: </label>
    <input type="password" id=" Confirmar-senha" name="confirmarsenha" required>
    
    <label for="tipo">Tipo de Usuário:</label>
    <select name="tipo" id="tipo">
      <option value="0">Usuário Regular</option>
    </select>
    
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
      </div>

       
    <script>
        function removeSpecialChars(inputId) {
            var inputElement = document.getElementById(inputId);
            inputElement.value = inputElement.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        }
    </script>


</body>

