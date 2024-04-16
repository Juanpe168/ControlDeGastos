<?php
include "connect.php";
$nomProducto = $_GET["nomProducto"].'%';

if($stmt = $mysqli->prepare("SELECT ID, concepto FROM productos where concepto like ? group by concepto order by concepto")){
	$stmt->bind_param("s", $nomProducto);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$DatosProducto = array();
	
	while($row = $result->fetch_assoc()) {
		
		$DatosProducto['DatosProducto'][] = $row;
		
	}
	
	echo json_encode($DatosProducto);
	
	$stmt->close();	
}
?>