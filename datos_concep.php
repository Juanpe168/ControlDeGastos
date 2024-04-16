<?php
include "connect.php";
$tag_c = $_GET["tag_c"].'%';

if($stmt = $mysqli->prepare("Select ID, concepto from productos where concepto like ? group by concepto order by concepto")){
	$stmt->bind_param("s", $tag_c);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$datosArticulos = array();
	
	while($row = $result->fetch_assoc()) {
		
		$datosArticulos['DatosArticulos'][] = $row;
		
	}
	
	echo json_encode($datosArticulos);
	$stmt->close();
	
}
?>