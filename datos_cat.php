<?php
include "connect.php";
$tag_cat = $_GET["tag_cat"].'%';

if($stmt = $mysqli->prepare("Select c.nombre from categoria c where c.nombre like ? group by c.nombre order by c.nombre")){
	$stmt->bind_param("s", $tag_cat);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$control = false;
	while($row = $result->fetch_assoc()) {
		if($control){
			echo ",";
		}
		$control=true;
		echo $row['nombre'];
	}
	$stmt->close();
}
?>