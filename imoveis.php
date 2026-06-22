<?php
session_start();
include "conexao.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $cidade = $_POST["cidade"];
    $endereco = $_POST["endereco"];
    $valor = $_POST["valor"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO imoveis (titulo, tipo, cidade, endereco, valor, descricao)
            VALUES ('$titulo', '$tipo', '$cidade', '$endereco', '$valor', '$descricao')";

    if ($conn->query($sql)) {
        echo "✔ Imóvel cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<h2>Cadastrar Imóvel</h2>

<form method="POST">
    Título: <input type="text" name="titulo"><br><br>
    Tipo: <input type="text" name="tipo"><br><br>
    Cidade: <input type="text" name="cidade"><br><br>
    Endereço: <input type="text" name="endereco"><br><br>
    Valor: <input type="number" step="0.01" name="valor"><br><br>
    Descrição:<br>
    <textarea name="descricao"></textarea><br><br>

    <button>Cadastrar</button>
</form>

<br>
<a href="listar_imoveis.php">Ver imóveis</a>