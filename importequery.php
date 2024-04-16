<?php
include "connect.php";
$nomImporte = $_GET["nomImporte"].'%';

if($stmt = $mysqli->prepare("SELECT ID, importe FROM productos where importe like ? group by importe order by importe")){
	$stmt->bind_param("s", $nomImporte);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$DatosImporte = array();
	
	while($row = $result->fetch_assoc()) {
		
		$DatosImporte['DatosImporte'][] = $row;
		
	}
	
	echo json_encode($DatosImporte);
	
	$stmt->close();	
}
?>