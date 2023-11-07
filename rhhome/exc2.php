<?php
include_once('config.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    // Se o usuário confirmou, então exclua a categoria
    $sqlc = "SELECT * FROM tb_empresas WHERE cod_empresa = :id";
    $stmc = $pdo->prepare($sqlc);
    $stmc->bindParam(':id', $id);
    $stmc->execute();

    if ($stmc->rowCount() > 0) {
        $sqlex = "DELETE FROM tb_empresas WHERE cod_empresa = $id";
        $stmex = $pdo->query($sqlex);
        echo "Categoria excluída com sucesso!";
    } else {
        echo "Categoria não encontrada!";
    }

    header('Location: crude2.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Exclusão</title>
    <script>
        function confirmDelete() {
            if (confirm("Tem certeza de que deseja excluir esta categoria?")) {
                // Se o usuário confirmar, envie um pedido POST para este mesmo arquivo
                // com um parâmetro 'confirm' para realizar a exclusão
                var form = document.createElement('form');
                form.method = 'post';
                form.action = '';
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'confirm';
                input.value = '1';
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</head>
<body>
    <button onclick="confirmDelete()">Excluir Categoria</button>
</body>
</html>
