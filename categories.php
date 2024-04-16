<?php
include "connect.php";

if($stmt = $mysqli->prepare("SELECT DISTINCT ID,nombre FROM categoria ORDER BY nombre ASC")){

	$stmt->execute();
	$result = $stmt->get_result();
	
	$datosCategoria = array();
	
	while($row = $result->fetch_assoc()) {
		
		$datosCategoria['datosCategoria'][] = $row;
		
	}
	$stmt->close();	
}
?>