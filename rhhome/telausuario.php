<html>
<head>
  <title>Perfil do Usuário</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .container {
      width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #e3eaf0;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h1 {
      text-align: center;
      color: #1f497d;
      margin-bottom: 20px;
    }

    .job-openings {
      text-align: center;
      color: #1f497d;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .job-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .job-list-item {
      background-color: #ffffff;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 3px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .job-title {
      font-size: 20px;
      color: #1f497d;
      margin-bottom: 5px;
    }

    .job-description {
      font-size: 16px;
      color: #6e77ac;
    }

    .user-info {
      flex: 1;
      margin-right: 20px;
    }

    .user-info h1 {
      text-align: center;
      color: #1f497d;
      margin-bottom: 20px;
    }

    .user-data {
      margin-bottom: 10px;
    }

    .user-data label {
      font-weight: bold;
      color: #1f497d;
    }


  </style>
</head>
<body>
  <div class="container">
    <h1>Perfil do Usuário</h1>

    <div class="user-data">
        <label for="nome">Nome:</label> JULIA SOARES
      </div>
      <div class="user-data">
        <label for="telefone">Telefone:</label> 7777777777
      </div>
      <div class="user-data">
        <label for="cpf">CPF:</label> 12312312334
      </div>
      
    <div class="user-data">
        <label for="nome">Email:</label> julia.jeziorny.soares@gmail.com
      </div>


    </div>

    <div class="job-openings">
      Vagas agendadas
    </div>

    <ul class="job-list">
      <li class="job-list-item">
        <div class="job-title">Desenvolvedor Web</div>
        <div class="job-description">Vaga agendada para às 11:00 do dia 27/07/2023, favor chegar com 10 minutos de antecedência. </div>
      </li>
      <li class="job-list-item">
        <div class="job-title">Designer Gráfico</div>
        <div class="job-description">Vaga agendada para às 15:00 do dia 28/07/2023.</div>
      </li>
      <li class="job-list-item">
        <div class="job-title">Analista de Marketing Digital</div>
        <div class="job-description">Vaga agendada para às 16:00 do dia 31/07/2023. Fique atento ao seu e-mai, o link da entrevista online será enviado minutos antes da entrevista. </div>
      </li>
      <!-- Add more job openings here -->
    </ul>
  </div>
</body>
</html>