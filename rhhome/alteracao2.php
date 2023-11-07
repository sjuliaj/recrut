<?php
session_start();
include_once('config.php');


$id = $_GET['id'];

$sql = "SELECT * FROM tb_empresas WHERE cod_empresa= :id";

$stmc = $pdo->prepare($sql);
$stmc->bindParam(':id', $id);
$stmc->execute();

$re = $stmc->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <a href="crude2.php" class="back-button">Voltar</a>
    <title>Alteração De Dados da Empresa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Alteração de Dados da Empresa</h2>
        <form method="POST">
            <div class="form-group">

                <label for="cand_nome">Nome</label>
                <input type="text" id="nome_emp" name="nome_emp" class="form-control" value="<?php echo $re->nome_emp; ?>">

                <label for="cand_cpf">Endereço</label>
                <input type="text" id="endereco_emp" name="endereco_emp" class="form-control" value="<?php echo $re->endereco_emp; ?>">

                <label for="cand_tel">Telefone</label>
                <input type="text" id="telefone_empresa" name="telefone_empresa" class="form-control" value="<?php echo $re->telefone_empresa; ?>">

                <label for="cand_email">Cnpj</label>
                <input type="text" id="cnpj_emp" name="cnpj_emp" class="form-control" value="<?php echo $re->cnpj_emp; ?>">

                <label for="dt_nasc">Email</label>
                <input type="text" id="email_emp" name="email_emp" class="form-control" value="<?php echo $re->email_emp; ?>">

                <label for="senha">Senha</label>
                <input type="text" id="senha_emp" name="senha_emp" class="form-control" value="<?php echo $re->senha_emp; ?>">
            </div>
            <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
        </form>
    </div>
</body>


</html>

<?php
// teste se botão foi pressionado
if (isset($_POST['btnAlterar'])) {

    //pego o valor do input (alterado ou não)
    $nome_emp = $_POST['nome_emp'];
    $endereco_emp = $_POST['endereco_emp'];
    $telefone_empresa = $_POST['telefone_empresa'];
    $cnpj_emp = $_POST['cnpj_emp'];
    $senha_emp= $_POST['senha_emp'];
    $ativo = $_POST['ativo'];

    //verifico se tem conteudo
    if (empty($nome_emp)) {
        echo "Necessário informar a descricao da categoria";
        exit();
    }

    //crio o sql de alteração
    $sqlup = "UPDATE tb_empresas SET nome_emp = :nome, endereco_emp = :endereco_emp, telefone_empresa = :telefone_empresa, cnpj_emp = :cnpj_emp, email_emp = :email_emp, senha_emp = :senha_emp
             WHERE cod_empresa = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parametros :descricao e :id
    $stmup->bindParam(':nome', $nome_emp);
    $stmup->bindParam(':endereco_emp', $endereco_emp);
    $stmup->bindParam(':telefone_empresa', $telefone_empresa);
    $stmup->bindParam(':cnpj_emp', $cnpj_emp);
    $stmup->bindParam(':email_emp', $email_emp);
    $stmup->bindParam(':senha_emp', $senha_emp);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: crude2.php");
    } else {
        echo "Erro ao alterar!";
    }
}

?>
