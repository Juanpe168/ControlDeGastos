<?php
	include "connect.php";
	
	if($stmt = $mysqli->prepare("SELECT propiedad FROM tienda")){

	$stmt->execute();
	$result = $stmt->get_result();
	
	$datosTienda = array();
	
	while($row = $result->fetch_assoc()) {
		
		$datosTienda['datosTienda'][] = $row;
		
	}
	$stmt->close();
	
}
?>



