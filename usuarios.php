<?php
	include "connect.php";
	
	if($stmt = $mysqli->prepare("SELECT DISTINCT ID,user FROM usuarios ORDER BY user")){

	$stmt->execute();
	$result = $stmt->get_result();
	
	$datosUser = array();
	
	while($row = $result->fetch_assoc()) {
		
		$datosUser['datosUser'][] = $row;
		
	}
	$stmt->close();
	
}
?>



