<?php

$host = "SEU_HOST";
$usuario = "SEU_USUARIO";
$senha = "SUA_SENHA";
$banco = "SEU_BANCO";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>