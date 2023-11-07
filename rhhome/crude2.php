<?php
include 'config.php';




// consulta, traz dados da tabela
$sql = "SELECT * FROM tb_empresas";
$resultado = $conexao->query($sql);

// Verificando se a consulta teve sucesso
if (!$resultado) {
    die('Erro na consulta: ' . $conexao->error);
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</head>
<style>
     body {
        background-color: #343a40; /* Cor de fundo escura (bg-dark) */
        color: white; /* Cor do texto geral */
    }
    
</style>
<body>
    <h2>
        <center>Listagem de Usuarios</center>
    </h2>
    <table class="table table-striped table-bordered">
        <tr class="table-dark">
            <th>cod</th>
            <th>nome</th>
            <th>endereco</th>
            <th>telefone</th>
            <th>cnpj</th>
            <th>email</th>
            <th>senha</th>
            <th>ativo</th>

        </tr>
        <?php while ($r = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $r['cod_empresa']; ?></td>
                <td><?php echo $r['nome_emp']; ?></td>
                <td><?php echo $r['endereco_emp']; ?></td>
                <td><?php echo $r['telefone_empresa']; ?></td>
                <td><?php echo $r['cnpj_emp']; ?></td>
                <td><?php echo $r['email_emp']; ?></td>
                <td><?php echo $r['senha_emp']; ?></td>
                <td><?php echo $r['ativo']; ?></td>
            
                <td><a href="alteracao2.php? id=<?php echo $r['cod_empresa'] ?>" class="btn btn-warning">ALTERAÇÃO</a> - <a href="exc2.php?id=<?php echo $r['cod_empresa'] ?>" class="btn btn-danger">EXCLUSÃO</a> </td>
            </tr>
        <?php } ?>
    </table>
    <!-- Seus scripts aqui -->
</body>

</html>