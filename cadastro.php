<?php
include "includes/conexao.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

// verifica duplicado
$check = $conn->prepare("SELECT id FROM usuarios WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
$msg = "Email já existe!";
} else {

$stmt = $conn->prepare("INSERT INTO usuarios (nome,email,senha,perfil) VALUES (?,?,?,'cliente')");
$stmt->bind_param("sss", $nome, $email, $senha);
$stmt->execute();

$msg = "Cadastro realizado!";
}
}
?>

<h2>Cadastro</h2>
<p><?php echo $msg; ?></p>

<form method="POST">
<input name="nome" placeholder="Nome"><br>
<input name="email" placeholder="Email"><br>
<input name="senha" type="password" placeholder="Senha"><br>
<button>Cadastrar</button>
</form>