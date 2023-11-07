<?php
include_once('config.php');

if (isset($_GET['cod_cand'])) {
    $id = $_GET['cod_cand'];

    // Criar a consulta SQL para exclusão
    $sql = "DELETE FROM tb_cidades WHERE cod_cidade = ?";
    
    // Preparar a consulta
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('cod_cand', $id);

    // Executar a consulta
    if ($stmt->execute()) {
        header("Location: crude.php");
        exit(); // Encerrar o script após redirecionar
    } else {
        echo "Erro ao excluir o registro.";
    }
} else {
    echo "ID de registro não fornecido.";
}
?>