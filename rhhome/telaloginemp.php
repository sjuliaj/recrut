<?php
include 'config.php';

if (isset($_SESSION["cod_empresa"])) {
  header("Location: homesite2.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obter dados do formulário
  $email = mysqli_real_escape_string($conexao, $_POST["email"]);
  $senha = md5($_POST['senha']);

  // Consulta SQL para verificar o usuário e recuperar o IV
  $sql = "SELECT * FROM tb_empresas WHERE email_emp = :email AND senha = :senha";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
  $stmt->execute();

  echo $email;
  echo $senha;

  // Verificar se a consulta retornou algum resultado
  if ($stmt->rowCount() == 1) {
    // Obter a senha criptografada e o IV do banco de dados
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $codigo_empresa = $row["cod_empresa"];

    // Iniciar sessão
    session_start();
    // Senhas coincidem, fazer login
    $_SESSION["cod_empresa"] = $codigo_empresa; // Armazenar o código do cliente na sessão
    header("Location: homesite2.php");
  } else {

    $error_message = "Email ou senha incorretos";
  }


}

// Fechar conexão
$conexao->close();




?>
<!DOCTYPE html>
<html>

<head>

  <style>
    body {
      background-color: #DCDCDC;
      font-family: 'Jost', sans-serif;
    }

    .container {
      width: 300px;
      margin: 100px auto;
      padding: 40px;
      background-color: #444;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h1 {
      text-align: center;
      color: #DCDCDC;
      margin-bottom: 20px;
    }

    .container input[type="text"],
    .container input[type="password"],
    .container input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 16px;
      border: 1px solid=#DCDCDC;
      border-radius: 3px;
    }

    .container input[type="submit"] {
      background-color: #000000;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .register-link a {
      color: white;
    }


    .container .forgot-password {
      text-align: center;
      margin-top: 20px;
    }

    .container .forgot-password a {
      color: #FF0000;
      text-decoration: none;
    }

    container .forgot-password a:hover {
      color: #DCDCDC;
    }

    .error-message {
      background-color: white;
      color: white;
      /* ou qualquer cor de texto desejada */
      /* Outras propriedades de estilo, se necessário */
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Login</h1>

    <form action="telaloginemp.php" method="POST">
      <input type="text" name="email" id="email-input" placeholder="email">
      <input type="password" name="senha" placeholder="Senha">

      <input type="submit" value="Entrar">

      <div class="register-link" style="text-align: center;">
        <a href="telacadempresa.php">Cadastre-se aqui</a>
      </div>
    </form>
    <?php
    if (isset($error_message)) {
      echo '<div class="font-jost text-base flex justify-center text-gray-200">' . $error_message . '</div>';
    }
    ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>



</body>

</html>