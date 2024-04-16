<?php
include "connect.php";


if($stmt = $mysqli->prepare("Select id, nombre from tienda where nombre like ? group by nombre order by nombre")){
	$stmt->bind_param("s", $tag_t);
	$stmt->execute();
	$result = $stmt->get_result();

	$datosTienda = array();
	
	while($row = $result->fetch_assoc()) {
		
		$datosTienda['DatosTienda'][] = $row;
		
	}
	
	echo json_encode($datosTienda);
	
	$stmt->close();
}
?>