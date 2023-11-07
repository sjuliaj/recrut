<?php
session_start(); // Inicie a sessão

// Verifique se o usuário não fez login
if (!isset($_SESSION["cod_cand"])) {
    header("Location: telalogin.php"); // Redirecione para a página de login
    exit();
}
?>