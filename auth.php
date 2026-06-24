<?php
session_start();
include "includes/conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($senha, $user["senha"])) {

$_SESSION["user_id"] = $user["id"];
$_SESSION["nome"] = $user["nome"];
$_SESSION["perfil"] = $user["perfil"];

if ($user["perfil"] == "admin") {
header("Location: admin/dashboard.php");
} else {
header("Location: cliente/painel.php");
}

} else {
echo "Login inválido";
}
?>