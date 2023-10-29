<?php
    session_start();

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $plano = $_POST["plano"];
    $estudante = $_POST["estudante"];

    $_SESSION["cadastro"] = 's';
    $_SESSION["nome"] = $nome;
    $_SESSION["idade"] = $idade;
    $_SESSION["estudante"] = $estudante;
    $_SESSION["plano"] = $plano;

    header("Location: ../../index.php");
?>