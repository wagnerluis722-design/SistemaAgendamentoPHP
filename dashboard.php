<?php
session_start();
include "conexao.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

// Estatísticas do sistema
$usuarios = $conn->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc();
$imoveis = $conn->query("SELECT COUNT(*) as total FROM imoveis")->fetch_assoc();
$agendamentos = $conn->query("SELECT COUNT(*) as total FROM agendamentos")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- Cabeçalho -->
    <div class="card p-4 mb-4 shadow-sm">
        <h2>Dashboard do Sistema</h2>
        <p class="mb-0">
            Bem-vindo,
            <b><?php echo $_SESSION["usuario_nome"]; ?></b>
        </p>
    </div>

    <!-- Menu -->
    <div class="mb-4">
        <a class="btn btn-primary" href="imoveis.php">Imóveis</a>
        <a class="btn btn-success" href="agendamento.php">Agendar</a>
        <a class="btn btn-info" href="listar.php">Meus Agendamentos</a>
        <a class="btn btn-danger" href="logout.php">Sair</a>
    </div>

    <!-- Estatísticas -->
    <div class="row">

        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm">
                <h5>Usuários</h5>
                <h2><?php echo $usuarios["total"]; ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm">
                <h5>Imóveis</h5>
                <h2><?php echo $imoveis["total"]; ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm">
                <h5>Agendamentos</h5>
                <h2><?php echo $agendamentos["total"]; ?></h2>
            </div>
        </div>

    </div>

</div>

</body>
</html>