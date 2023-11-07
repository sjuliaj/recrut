<?php
require_once('config2.php');

function validarEmail($email) {
    global $conexao;

    $sql = "SELECT * FROM tb_empresas WHERE email_emp = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}

function validarCPF($cnpj) {
    global $conexao;

    $sql = "SELECT * FROM tb_empresas WHERE cnpj_emp = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $cnpj);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}

function validarTelefone($telefone) {
    global $conexao;

    $sql = "SELECT * FROM tb_empresas WHERE telefone_empresa= ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $telefone);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 0;
}
?>