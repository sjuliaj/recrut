<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try - Recrutamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
</head>
<body class="bg-dark">

<link rel="icon" type="image/x-icon" href="favicon.ico">  

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
    // Fechar conexão
    $conexao->close();
    ?>

<?php if (isset($nome_cand)) {
                // Se o usuário está logado, exibir botão de logoff
            ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Try - Recrutamento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">

                        
                        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">CONTATO</a> 
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sobrenós.php">SOBRE NÓS</a>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="vagas.php">VAGAS</a>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="perfilcand.php">MEU PERFIL</a>
          <li class="nav-item">         

        </li>
                    </li>
                </ul>
            </div>
            
            <div class="text-center text-white me-2"><?php echo $nome_cand; ?></div>
            <a href="logout.php" class="me-5">Logoff</a>

        </div>
    </nav>
    <?php } else {
                // Se o usuário não está logado, exibir botões de cadastro e login
            ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Try - Recrutamento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">

                        
                        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">CONTATO</a> 
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sobrenós.php">SOBRE NÓS</a>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="agendamento.php">VAGAS</a>
          <li class="nav-item">        

        </li>
                    </li>
                </ul>
            </div>

            <a href="teladeescolha.php"><button type="button" class="btn btn-secondary rounded-3 btn-lg" style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .50rem; --bs-btn-font-size: .75rem; background-color: transparent; border: none;">Cadastre-se</button></a>
            <a href="teladeescolhalogin.php"><button type="button" class="btn btn-secondary rounded-3 btn-lg" style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .50rem; --bs-btn-font-size: .75rem; background-color: transparent; border: none;">Login</button></a>
            
            
        </div>
    </nav>

            <?php } ?>


</body>
</html>


<!DOCTYPE html>
<html>
<head>
 <title>Try- Recrutamento</title>
 <style>
   body {
     background-size: cover;
     background-position: center;
     margin: 0;
     padding: 0;
     position: relative;
   }

   .header {
     display: flex;
     align-items: center;
     padding: 50px;
     position: fixed;
     z-index: 2; 
     background-color: rgba(255, 255, 255, 0.8); 
   }


   .header-image {
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     height: 400px;
     object-fit: cover;
     z-index: 1; 
   }

   .imagem_vaga_txt{
     display: flex;
     justify-content: flex-end;
     align-items: flex-end;
     padding: 20px;
     flex-direction: row;
   }

   .text_vaga{
     color: rgb(27, 23, 23);
     padding: 50px;
     font-size: 30px;
     text-align: justify;
     text-shadow: 1px 1px 1px #fff;
     font-family: Chalkduster, fantasy;
   }

   .img {
     align-items: center;
     padding: 50px;
   }

   .header-text {
     color: #110202;
     font-size: 24px;
   }

   .text {
     color: rgb(27, 23, 23);
     font-size: 30px;

     text-align: center;
     text-shadow: 1px 1px 1px #fff;
     
   }

 

 
   .carrossel {
     display: flex;
     justify-content: center;
     align-items: center;
     margin-top: 20px;
   }

   .carrossel img {
     max-width: 100px;
     max-height: 100px;
     margin: 0 10px;
     transition: transform 0.3s ease;
   }

   .carrossel img:hover {
     transform: scale(1.1);
   }
   .footer {
     background-color: #110202;
     color: white;
     text-align: center;
     padding: 20px;
     position: relative;
     clear: both;
   }

   .contact-button {
     font-size: 18px;
     background-color: #1f8f99;
     color: white;
     border: none;
     padding: 8px 20px;
     cursor: pointer;
     transition: background-color 0.3s ease;
   }

   .contact-button:hover {
     background-color: #128587;
   }

       #menu-mobile{
         position: absolute;
     top: 20px;
     left: 20px
     z-index: 2;
     }

     #menu-mobile {
     color: white;
     text-decoration: none;
     font-size: 18px;
   }

   #menu-slider {
     position: relative;
     z-index: 1;
   }
   
   .header-image {
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     height: 400px;
     object-fit: cover;
     z-index: -1;
   }

   #teste{
     display: flex;
 justify-content: space-between;
   }

   #titulo{
     padding-left:70px;
     padding-top:30px
   }

   ul.menu {
   list-style: none;
   padding: 0;
   margin: 0;
   background-color: #333;
   display: flex;
 }

 ul.menu li {
   padding: 10px 20px;
   position: relative;
   color: #fff;
   cursor: pointer;
 }

 
 ul.menu ul.dropdown {
   display: none;
   position: absolute;
   top: 100%;
   left: 0;
   background-color: #444;
   width: 150px;
 }

 ul.menu li:hover ul.dropdown {
   display: block;
 }

 ul.menu ul.dropdown li {
   padding: 10px;

 }

 .text-azul-escuro {
  color: #000080; /* Você pode ajustar o código de cor para a tonalidade de azul desejada */
}

#loginAlert {
    position: fixed;
    top: 24px; /* Distância do topo */
    right: 10px; /* Distância da direita */
    width: 250px; /* Largura do alerta */
    padding: 50px; /* Espaçamento interno */
    font-size: 18px; /* Tamanho da fonte */
    background-color: rgba(0, 0, 0, 0.8); /* Cor de fundo */
    border: 1px #000 ; /* Borda */
    color: #fff; /* Cor do texto */
    display: none;
}
.homepage-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 500px;
            z-index: -1;
        }

        .solutions-text {
            position: absolute;
            top: 90px; /* Ajuste a posição vertical conforme necessário */
            left: 90px; /* Ajuste a posição horizontal conforme necessário */
            color: #ffffff; /* Cor do texto */
            font-size: 50px; /* Tamanho da fonte */
            text-shadow: 1px 1px 1px #000; /* Sombra do texto */
            right: 10px; /* Distância da direita */
            animation: moveText 1.5s ease-in-out;
            
         
        }
        @keyframes moveText {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }


        .solutions-description {
            position: absolute;
            top: 200px; /* Ajuste a posição vertical conforme necessário */
            left: 100px; /* Ajuste a posição horizontal conforme necessário */
            color: #ffffff; /* Cor do texto */
            font-size: 16px; /* Tamanho da fonte */
            text-shadow: 1px 1px 1px #000; /* Sombra do texto */
            right: 10px; /* Distância da direita */
            width: 250px; /* Largura do alerta */
            animation: moveText 1.5s ease-in-out; /* Ajuste a duração e o tipo de animação conforme necessário */
        }

        .line-white {
        position: center;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background-color: #fff;
    }
   /* Classe CSS personalizada para tornar os cards menores na vertical e ajustar a largura */
   .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Espaçamento automático entre os cards */
    margin: -10px 0 0 -10px; /* Espaçamento negativo para compensar o espaçamento interno dos cards */
}

/* Estilos para os cards individuais */
.card {
    max-width: 300px; /* Largura máxima do card */
    max-height: 350px; /* Altura máxima do card */
    margin: 2.5px; /* Espaçamento entre os cards e margem superior negativa */
    background-color: #fff; /* Cor de fundo do card */
    border-radius: 10px; /* Borda arredondada */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra do card */
    transition: transform 0.3s ease; /* Efeito de escala suave no hover */
    left: 70px;
}

.card:hover {
    transform: scale(1.05); /* Aumenta o tamanho do card no hover */
}

/* Estilos para o título do card */
.card-title {
    font-size: 20px;
    margin: 10px;
    text-align: center;
}

/* Estilos para a imagem do card */
.card-img-top {
    max-width: 100%;
    max-height: 200px; /* Altura máxima da imagem */
    object-fit: cover; /* Redimensiona a imagem para preencher o espaço */
    border-top-left-radius: 10px; /* Borda arredondada no canto superior esquerdo */
    border-top-right-radius: 10px; /* Borda arredondada no canto superior direito */
}

/* Estilos para o corpo do card */
.card-body {
    padding: 10px; /* Espaçamento interno para o conteúdo do card */
}

/* Estilos para o texto do card */
.card-text {
    font-size: 16px;
    text-align: justify;
}

 </style>

</head>
<body class="bg-dark">2
 <!--Tela Logado-->
 <?php if(isset($nome_cliente)) { ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Try - Recrutamento </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    </div>


  
  <?php } ?>

<img src="imagemhead.jpg" alt="Header Image" style="width: 100%; height: 500px; object-fit: cover; opacity: 0.2;">

<h1>
<div class="solutions-text">SOLUÇÕES DE RH </div>

<div class="line-white">
<hr class="line-white">

</h1>
    <div class="solutions-description">
        A RH Try - recrutamento possui habilidades em agendamento de vagas de uma forma diferente. Nosso objetivo é aproximar empresas e candidatos dando mais autonomia para o nosso usuário. 
    </div>


    </div>
   <br>

 
   </div>


 <div class="text">
 
  

   <br>
  
   <p class="text-white">Navegue pelas vagas, se identifique e marque uma entrevista com as nossas empresas parceiras.</p>
   </div>
   <br>


   <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="empresabradesco.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">BRADESCO</h5>
        <p class="card-text"></p>O Bradesco é uma das principais instituições financeiras do Brasil.  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="empresacopel.png" class="card-img-top" alt="...">
      <div class="card-body">  
        <h5 class="card-title">COPEL</h5>
        <p class="card-text"></p> Rede de energia brasileira
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="empresajon.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">JON DEERE</h5>
        <p class="card-text"></p> Empresa de maquinários agrícolas americana
      </div>
    </div>
  </div>
</div>


  <br>
  <br>
  <br>
  
  

   <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   

   if (isset($_POST["cadastro"])) {
      
       header("Location: teladecadastro.php");
       exit;
   } elseif (isset($_POST["login"])) {
     
       header("Location: telalogin.php");
       exit;
   }
}
?>

  <div id="loginAlert" class="alert alert-success alert-dismissible fade show text-light" style="display: none;">
    Você está logado! Vamos agendar uma vaga?? <a href="vagas.php"> Clique aqui </a> 
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Fechar"></button>
</div>


<script>
    // Verifique se o usuário está logado
    var nomeCandidato = "<?php echo isset($nome_cand) ? $nome_cand : ''; ?>";

    if (nomeCandidato !== "") {
        // Se o usuário está logado, mostre o alerta
        var loginAlert = document.getElementById('loginAlert');
        loginAlert.style.display = 'block';

        // Adicione um evento de clique ao botão "x" para fechar o alerta
        var closeButton = loginAlert.querySelector('.btn-close');
        closeButton.addEventListener('click', function() {
            loginAlert.style.display = 'none';
        });
    }
</script>
<!-- Footer Start -->
</div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container d-flex justify-content-center">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0 text-nowrap">&copy; <a class="text-primary" href="#">Try- recrutamento
                    </a>. Todos os
                        Direitos Reservados.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
   
   
</body>
</html>
</body>
</html>