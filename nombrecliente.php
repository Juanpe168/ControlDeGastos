<?php
include "connect.php";
$nomCliente = $_GET["nomCliente"].'%';
 
if($stmt = $mysqli->prepare("SELECT ID, nombre FROM cliente where nombre like ? group by nombre order by nombre")){
	$stmt->bind_param("s", $nomCliente);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$nombreCliente = array();
	
	while($row = $result->fetch_assoc()) {
		
		$nombreCliente['nombreCliente'][] = $row;
		
	}
	
	echo json_encode($nombreCliente);
	
	$stmt->close();	
}
?>