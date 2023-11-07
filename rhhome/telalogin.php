<?php
      session_start();
      include 'config.php';

      if (isset($_SESSION["cod_cand"])) {
          header("Location: homesite.php");
          exit();
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Obter dados do formulário
          $email = $_POST["email"];
          $senha = md5($_POST['senha']);

         // Consulta SQL para verificar o usuário
        $sql = "SELECT * FROM tb_candidatos WHERE cand_email= ? AND senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
       

      // Verificar se a consulta retornou algum resultado
      if ($result-> num_rows == 1) {
          // Login bem-sucedido, obter o código do cliente
          $row = $result->fetch_assoc();
          $codigo_cand = $row["cod_cand"];
          $_SESSION["cod_cand"] = $codigo_cand;

          $message = "Login efetuado com sucesso!";
          
          $_SESSION["cod_cand"] = $codigo_cand; // Armazenar o código do cliente na sessão
          
          $sql1 = "SELECT * FROM tb_candidatos WHERE cand_email = '$email' AND senha = '$senha'";       
      $result1 = $conexao->query($sql1);
      // Armazene o valor retornado em uma variável
      $row = mysqli_fetch_array($result1);
      $tipocadastro = $row['tipo_cand'];

      //CONDIÇÃO QUE VALIDA O TIPO DO CADASTRO A (Administrador) E P (Paciente).

      // Use a variável $tipocadastro como desejar
      if ($tipocadastro == "A") {
          //Se a variável $tipocadastro for igual a A (Adminstrador), redireciona para a página do administrador (indexadmin.php).
          header("location:pgadm.php");
          exit();
          
          //Se a variável $tipocadastro for igual a P (Paciente), redireciona para a página do administrador (index.php).
      } elseif ($tipocadastro == "C") {
          // Redirecione para a página do paciente
          header("location: homesite.php");
          exit();
      }

      } else {
          // Login falhou
          $error_message = "Usuário ou senha incorretos!";
      }
      }
    


      // Fechar conexão
      $conexao->close();

      ?>
      <!DOCTYPE html>
      <html>
      <head>
        <title>Seja bem-vindo</title>
        <style>
          body {
            background-color: #DCDCDC;
            font-family: 'Jost', sans-serif;
          }

          .container {
            width: 300px;
            margin: 100px auto;
            padding: 40px;
            background-color: #444 ;
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
            border: 1px solid= #DCDCDC;
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
    color: white; /* ou qualquer cor de texto desejada */
    /* Outras propriedades de estilo, se necessário */
}

          
        </style>
      </head>
      <body>
        <div class="container">
          <h1>Login</h1>

          <form action="telalogin.php" method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="senha" placeholder="Senha">
            <?php
                                  if(isset($error_message)){ ?>
                                      <div><?php echo $error_message;?></div> 
                                

                                      <?php }?>
            <input type="submit" value="Entrar">
            
            <div class="register-link" style="text-align: center;">
      <a href="teladecadastro.php">Cadastre-se aqui</a>
  </div>

  <div class="register-link" style="text-align: center;">
      <a href="recsenha.php">Esqueceu a senha?</a>
  </div>

      </div>

            </div>
            
          
                                </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
       


      </body>
      </html>