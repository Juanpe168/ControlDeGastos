<?php
include "connect.php";

$sql = "SELECT cat.nombre, cl.nombre AS 'Clientes',p.ID AS 'IDProducto', p.concepto, p.importe, 
t.propiedad, u.user FROM productos as p INNER JOIN cliente AS cl ON p.ID_Cliente = cl.ID INNER JOIN categoria AS cat ON p.ID_categoria = 
cat.ID INNER JOIN usuarios AS u ON p.ID_Usuario = u.ID INNER JOIN tienda AS t ON p.ID_Tienda = t.ID";





if($stmt = $mysqli->prepare($sql)){
							
	$stmt->execute();
	$result = $stmt->get_result();
	
	$Selectcategoria = array();
	
	while($row = $result->fetch_assoc()) {
		
		$Selectcategoria['Selectcategoria'][] = $row;
		
	}
	
	echo json_encode($Selectcategoria);
	
	$stmt->close();	
}
?>