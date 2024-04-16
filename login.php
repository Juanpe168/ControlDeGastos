<?php

session_start();

include "connect.php";

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];
$password="";
$contrasenaEncriptada=md5($contrasena);
if($stmt = $mysqli->prepare('SELECT password FROM usuarios WHERE user=?')){
	$stmt->bind_param("s", $usuario);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()) {
	  $password = $row['password'];
	}
	$stmt->close();

	if($contrasenaEncriptada == $password) {
		$_SESSION["usuario"]=$usuario;
		header('Location: tiendas.php');
	} else {
		header('Location: index.php?error=yes');
	}
}
?> 
