<?php
session_start();
include "conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM agendamentos WHERE id='$id'";
$result = $conn->query($sql);
$ag = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $data = $_POST["data"];
    $descricao = $_POST["descricao"];

    $conn->query("UPDATE agendamentos SET 
        titulo='$titulo',
        data_agendamento='$data',
        descricao='$descricao'
        WHERE id='$id'");

    header("Location: listar.php");
}
?>

<h2>Editar Agendamento</h2>

<form method="POST">
    Título: <input type="text" name="titulo" value="<?php echo $ag['titulo']; ?>"><br><br>
    Data: <input type="date" name="data" value="<?php echo $ag['data_agendamento']; ?>"><br><br>
    Descrição:<br>
    <textarea name="descricao"><?php echo $ag['descricao']; ?></textarea><br><br>

    <button>Atualizar</button>
</form>