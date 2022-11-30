<?php
	
	require 'conexion.php';
 
    if (isset($_GET['id'])) {

        $id=(int) $_GET['id'];
	
    $consulta= "DELETE FROM usuario WHERE id = '$id'";
    $resultado=$con->prepare($consulta);
    $resultado->execute();

	 
   
    
    }
    
    if ($resultado) {
        header ('Location: index.php');
       
    }
    
?>
 
