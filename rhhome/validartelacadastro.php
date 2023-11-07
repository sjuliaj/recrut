<?php
require_once('config.php');

function validarEmail($email) {
    global $conexao;

    $sql = "SELECT * FROM tb_candidatos WHERE cand_email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}

function validarCPF($cpf) {
    global $conexao;

    $sql = "SELECT * FROM tb_candidatos WHERE cand_cpf = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}

function validarTelefone($telefone) {
    global $conexao;

    $sql = "SELECT * FROM tb_candidatos WHERE cand_tel = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $telefone);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}
?>