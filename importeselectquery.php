<?php
include "connect.php";

if($stmt = $mysqli->prepare("SELECT ID,concepto FROM productos")){
							
	$stmt->execute();
	$result = $stmt->get_result();
	
	$Selectimporte = array();
	
	while($row = $result->fetch_assoc()) {
		
		$Selectimporte['Selectimporte'][] = $row;
		
	}
	
	echo json_encode($Selectimporte);
	
	$stmt->close();	
}
