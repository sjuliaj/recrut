<?php
include_once('config.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    // Se o usuário confirmou, então exclua o candidato
    $sqlc = "SELECT * FROM tb_candidatos WHERE cod_cand = :id";
    $stmc = $pdo->prepare($sqlc);
    $stmc->bindParam(':id', $id);
    $stmc->execute();

    if ($stmc->rowCount() > 0) {
        $sqlex = "DELETE FROM tb_candidatos WHERE cod_cand = $id";
        $stmex = $pdo->query($sqlex);
        echo "Candidato excluído com sucesso!";
    } else {
        echo "Candidato não encontrado!";
    }

    header('Location: crude.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Exclusão</title>
    <script>
        function confirmDelete() {
            if (confirm("Tem certeza de que deseja excluir este candidato?")) {
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
    <button onclick="confirmDelete()">Excluir Candidato</button>
</body>
</html>
