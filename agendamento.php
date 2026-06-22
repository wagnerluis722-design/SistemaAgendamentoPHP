<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "conexao.php";

echo "<pre>";
echo "===== SESSÃO =====\n";
print_r($_SESSION);

echo "\n===== POST =====\n";
print_r($_POST);
echo "</pre>";

if (!isset($_SESSION["usuario_id"])) {
    die("Erro: Usuário não está logado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = trim($_POST["titulo"]);
    $data = $_POST["data"];
    $descricao = trim($_POST["descricao"]);
    $usuario_id = $_SESSION["usuario_id"];

    echo "<hr>";
    echo "<h3>Dados recebidos:</h3>";
    echo "Usuário ID: " . $usuario_id . "<br>";
    echo "Título: " . $titulo . "<br>";
    echo "Data: " . $data . "<br>";
    echo "Descrição: " . $descricao . "<br><br>";

    $sql = "INSERT INTO agendamentos
            (usuario_id, titulo, data_agendamento, descricao)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("<h3>Erro ao preparar SQL:</h3> " . $conn->error);
    }

    $stmt->bind_param("isss", $usuario_id, $titulo, $data, $descricao);

    if ($stmt->execute()) {

        echo "<h2 style='color:green'>✔ Agendamento salvo com sucesso!</h2>";

        echo "ID do novo agendamento: " . $conn->insert_id;

    } else {

        echo "<h2 style='color:red'>Erro ao salvar!</h2>";

        echo "<b>Erro Statement:</b><br>";
        echo $stmt->error . "<br><br>";

        echo "<b>Erro MySQL:</b><br>";
        echo $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<title>Sistema de Agendamento</title>
</head>

<body>

<h2>Novo Agendamento</h2>

<form method="POST">

<label>Título</label><br>
<input type="text" name="titulo" required><br><br>

<label>Data</label><br>
<input type="date" name="data" required><br><br>

<label>Descrição</label><br>
<textarea name="descricao"></textarea><br><br>

<button type="submit">
Salvar Agendamento
</button>

</form>

<br>

<a href="listar.php">Ver meus agendamentos</a>

</body>
</html>