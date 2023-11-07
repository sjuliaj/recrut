<?php
session_start();
include_once('config.php');


$id = $_GET['id'];

$sql = "SELECT * FROM tb_candidatos WHERE cod_cand = :id";

$stmc = $pdo->prepare($sql);
$stmc->bindParam(':id', $id);
$stmc->execute();

$re = $stmc->fetch(PDO::FETCH_OBJ);

/*
COMO USAR:
FETCH_ASSOC = $re['idcategoria']
FETCH_OBJ = $re->idcategoria
*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <a href="concategoria.php" class="back-button">Voltar</a>
    <title>Alteração de Candidatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Alteração de Candidatos</h2>
        <form method="POST">
            <div class="form-group">

                <label for="cand_nome">Nome</label>
                <input type="text" id="cand_nome" name="nome" class="form-control" value="<?php echo $re->cand_nome; ?>">

                <label for="cand_cpf">CPF</label>
                <input type="text" id="cand_cpf" name="cand_cpf" class="form-control" value="<?php echo $re->cand_cpf; ?>">

                <label for="cand_tel">Telefone</label>
                <input type="text" id="cand_tel" name="cand_tel" class="form-control" value="<?php echo $re->cand_tel; ?>">

                <label for="cand_email">Email</label>
                <input type="text" id="cand_email" name="cand_email" class="form-control" value="<?php echo $re->cand_email; ?>">

                <label for="dt_nasc">Data Nascimento</label>
                <input type="text" id="dt_nasc" name="dt_nasc" class="form-control" value="<?php echo $re->dt_nasc; ?>">

                <label for="senha">Senha</label>
                <input type="text" id="senha" name="senha" class="form-control" value="<?php echo $re->senha; ?>">
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
    $cand_nome = $_POST['nome'];
    $cand_cpf = $_POST['cand_cpf'];
    $cand_tel = $_POST['cand_tel'];
    $cand_email = $_POST['cand_email'];
    $dt_nasc = $_POST['dt_nasc'];
    $senha = $_POST['senha'];

    //verifico se tem conteudo
    if (empty($cand_nome)) {
        echo "Necessário informar a descricao da categoria";
        exit();
    }

    //crio o sql de alteração
    $sqlup = "UPDATE tb_candidatos SET cand_nome = :nome, cand_cpf = :cand_cpf, cand_tel = :cand_tel, cand_email = :cand_email, dt_nasc = :dt_nasc, senha = :senha
             WHERE cod_cand = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parametros :descricao e :id
    $stmup->bindParam(':nome', $cand_nome);
    $stmup->bindParam(':cand_cpf', $cand_cpf);
    $stmup->bindParam(':cand_tel', $cand_tel);
    $stmup->bindParam(':cand_email', $cand_email);
    $stmup->bindParam(':dt_nasc', $dt_nasc);
    $stmup->bindParam(':senha', $senha);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: crude.php");
    } else {
        echo "Erro ao alterar!";
    }
}

?>
