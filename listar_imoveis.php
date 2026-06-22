<?php
include "conexao.php";

$sql = "SELECT * FROM imoveis";
$result = $conn->query($sql);
?>

<h2>Lista de Imóveis</h2>

<a href="imoveis.php">Novo Imóvel</a><br><br>

<?php while($row = $result->fetch_assoc()) { ?>

<div style="border:1px solid #000; margin:10px; padding:10px;">
    <b><?php echo $row["titulo"]; ?></b><br>
    Tipo: <?php echo $row["tipo"]; ?><br>
    Cidade: <?php echo $row["cidade"]; ?><br>
    Endereço: <?php echo $row["endereco"]; ?><br>
    Valor: R$ <?php echo $row["valor"]; ?><br>
    <?php echo $row["descricao"]; ?><br>
</div>

<?php } ?>