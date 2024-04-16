<?php
include "connect.php";
$sql="SELECT cat.nombre, cl.nombre AS 'Clientes',p.ID AS 'IDProducto',t.nombre AS 'Tienda', p.concepto, p.fecha, p.importe, t.propiedad, u.user FROM productos as p INNER JOIN cliente 
AS cl ON p.ID_Cliente = cl.ID INNER JOIN categoria AS cat ON p.ID_categoria = cat.ID INNER JOIN usuarios AS u ON p.ID_Usuario = u.ID INNER JOIN tienda AS t ON p.ID_Tienda = t.ID";

$controlWhere = false;
$controlAnd = false;
$condiciones = "";

if ($_POST["categoria"] != 0){
	$categoria = $_POST["categoria"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and cat.id =" .$categoria;
	}else{
		$condiciones = $condiciones." cat.id =" .$categoria;
	}
	$controlAnd = true;

}

if ($_POST["nomCliente"] != ""){
	$nomCliente = $_POST["nomCliente"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and cl.nombre like '%" .$nomCliente."%'";
	}else{
		$condiciones = $condiciones." cl.nombre like '%" .$nomCliente."%'";
	}
	$controlAnd = true;

}

if ($_POST["nomProducto"] != ""){
	$nomProducto = $_POST["nomProducto"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and p.concepto like '%" .$nomProducto."%'";
	}else{
		$condiciones = $condiciones." p.concepto like '%" .$nomProducto."%'";
	}
	$controlAnd = true;

}

if ($_POST["nomImporte"] != 0){
	$nomImporte = $_POST["nomImporte"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and p.importe = " .$nomImporte;
	}else{
		$condiciones = $condiciones." p.importe = " .$nomImporte;
	}
	$controlAnd = true;

}


if ($_POST["nomTienda"] != ""){
	$nomTienda = $_POST["nomTienda"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and t.nombre like '%" .$nomTienda."%'";
	}else{
		$condiciones = $condiciones." t.nombre like '%" .$nomTienda."%'";
	}
	$controlAnd = true;

}

if ($_POST["nomUser"] != 0){
	$nomUser = $_POST["nomUser"];
	$controlWhere = true;
	if($controlAnd){
		$condiciones = $condiciones." and u.ID = $nomUser";
	}else{
		$condiciones = $condiciones." u.ID = $nomUser";
	}
	$controlAnd = true;

}

if($controlWhere){
	$condiciones = " where".$condiciones;
}
$sql = $sql . $condiciones;



if($stmt = $mysqli->prepare($sql)){
							
	$stmt->execute();
	$result = $stmt->get_result();
	
	$DatosCompra = array();
	
	while($row = $result->fetch_assoc()) {
		
		$DatosCompra['DatosCompra'][] = $row;
		
	}
	
	echo json_encode($DatosCompra);
	
	$stmt->close();	
}
?>