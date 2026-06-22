<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Bem-vindo ao Sistema</h1>

<p>Usuário: <?php echo $_SESSION["usuario_nome"]; ?></p>

<a href="logout.php">Sair</a>