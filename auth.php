<?php
session_start();
include "conexao.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

/* BUSCA SEGURA NO BANCO */
$sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $row = $result->fetch_assoc();

    /* Verificação simples (caso senha não esteja criptografada) */
    if ($senha == $row['senha']) {

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user'] = $row['usuario'];

        header("Location: dashboard.php");
        exit();

    } else {
        header("Location: login.php?erro=1");
        exit();
    }

} else {
    header("Location: login.php?erro=1");
    exit();
}
?>