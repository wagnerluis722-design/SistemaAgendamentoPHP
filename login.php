<?php
session_start();

// Se já estiver logado, vai direto pro dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Agendamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="login-container">

    <h2>Login do Sistema</h2>

    <?php
    if (isset($_GET['erro'])) {
        echo "<p style='color:red;text-align:center;'>Usuário ou senha inválidos</p>";
    }
    ?>

    <form action="auth.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

</div>

</body>
</html>