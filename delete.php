<?php
	
	require 'conexion.php';
 
	$id = $_POST['id'];
	
    $consulta= "DELETE FROM usuario WHERE id = '$id'";
    $resultado=$con->prepare($consulta);
    $resultado->execute();
	
    echo "<script> alert('el registor ha sido borrado') </script>";
	
?>
 
