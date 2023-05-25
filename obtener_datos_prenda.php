<?php
// Conexión a la base de datos
include "db.php";

// Obtener el idPrenda de la petición
$idPrenda = $_GET['idPrenda'];

// Consulta para obtener los campos de la prenda
$sql = "SELECT idPrenda, idPersona, FotoPrenda, Tipo, Color, Estilo FROM tbl_prenda WHERE idPrenda = $idPrenda";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // La consulta ha devuelto resultados, obtener los campos de la prenda
    $row = $result->fetch_assoc();
    
    // Crear un arreglo asociativo con los campos de la prenda
    $prenda = array(
        'idPrenda' => $row['idPrenda'],
        'idPersona' => $row['idPersona'],
        'FotoPrenda' => $row['FotoPrenda'],
        'Tipo' => $row['Tipo'],
        'Color' => $row['Color'],
        'Estilo' => $row['Estilo']
    );
    
    // Devolver los campos de la prenda como respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($prenda);
} else {
    // No se encontró ninguna prenda con el idPrenda especificado
    echo "No se encontró ninguna prenda";
}
?>
