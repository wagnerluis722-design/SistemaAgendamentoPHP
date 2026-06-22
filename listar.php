<?php
session_start();
include "conexao.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION["usuario_id"];

$sql = "SELECT 
            ag.id,
            ag.data_agendamento,
            ag.descricao,
            im.titulo AS imovel
        FROM agendamentos ag
        INNER JOIN imoveis im ON ag.imovel_id = im.id
        WHERE ag.usuario_id='$usuario_id'";

$result = $conn->query($sql);
?>

<h2>Meus Agendamentos</h2>

<a href="agendamento.php">Novo Agendamento</a><br><br>

<?php while($row = $result->fetch_assoc()) { ?>

<div style="border:1px solid #000; margin:10px; padding:10px;">
    <b>Imóvel:</b> <?php echo $row["imovel"]; ?><br>
    <b>Data:</b> <?php echo $row["data_agendamento"]; ?><br>
    <b>Descrição:</b> <?php echo $row["descricao"]; ?><br>

    <a href="editar.php?id=<?php echo $row["id"]; ?>">Editar</a> |
    <a href="excluir.php?id=<?php echo $row["id"]; ?>">Excluir</a>
</div>

<?php } ?>