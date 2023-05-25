<?php
include "db.php";

$id = $_POST['id'];

$consulta = "DELETE FROM Tbl_Conjuntos WHERE id = $id";
$conn->query($consulta);

header("Location: micloset.php");
exit();
?>
