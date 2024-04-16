<?php
include "connect.php";

if($stmt = $mysqli->prepare("SELECT ID,nombre FROM cliente")){
							
	$stmt->execute();
	$result = $stmt->get_result();
	
	$Selectcliente = array();
	
	while($row = $result->fetch_assoc()) {
		
		$Selectcliente['Selectcliente'][] = $row;
		
	}
	
	echo json_encode($Selectcliente);
	
	$stmt->close();	
}