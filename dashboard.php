<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="sidebar">
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="agendar.php">📅 Agendamentos</a>
    <a href="listar.php">📋 Listar</a>
    <a href="logout.php">🚪 Sair</a>
</div>

<div class="content">

    <div class="header">
        Bem-vindo, <?php echo $_SESSION['user']; ?>
    </div>

    <div class="card">
        <h3>Resumo do Sistema</h3>
        <p>Total de agendamentos, usuários e status do sistema.</p>
    </div>

    <div class="card">
        <h3>Status</h3>
        <p>Sistema funcionando corretamente ✔</p>
    </div>

</div>

</body>
</html>