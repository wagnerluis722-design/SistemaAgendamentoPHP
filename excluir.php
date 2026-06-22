<?php
include "conexao.php";

$id = $_GET["id"];

$conn->query("DELETE FROM agendamentos WHERE id='$id'");

header("Location: listar.php");
?>