<?php
include "connect.php";
$nomTienda = $_GET["nomTienda"].'%';

if($stmt = $mysqli->prepare("SELECT ID, nombre FROM tienda where nombre like ? group by nombre order by nombre")){
	$stmt->bind_param("s", $nomTienda);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$DatosTienda = array();
	
	while($row = $result->fetch_assoc()) {
		
		$DatosTienda['DatosTienda'][] = $row;
		
	}
	
	echo json_encode($DatosTienda);
	
	$stmt->close();	
}
?>