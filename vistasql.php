<?php session_start(); ?>

<?php
include 'connect.php';
?>

<?php 




HOLA echo $_POST["Nomclie"];

$query = 'SELECT p.ID_categoria,c.nombre,p.ID_Cliente,cl.nombre,cl.ID,p.concepto,p.fecha,p.importe,p.ID_Tienda,p.ID_Usuario,u.user,u.ID,c.ID
FROM productos AS p INNER JOIN categoria AS c ON p.ID_categoria = c.ID INNER JOIN cliente AS cl ON p.ID_Cliente = cl.ID INNER JOIN usuarios AS u
ON p.ID_Usuario = u.ID';













?>