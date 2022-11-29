<?php

    include_once 'conexion.php';

    if (isset($_POST['guardar'])) {
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $ciudad=$_POST['ciudad'];
        $correo=$_POST['correo'];

            if (!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($correo) && !empty($ciudad)){

                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    echo "<script> alert('Correo no valido') </script>";
                }else{

                    $consulta_insert=$con->prepare('INSERT INTO usuario (nombre,apellidos,telefono,ciudad,correo)
                     VALUES (:nombre,:apellido,:telefonos,:ciudad,:correo)');
                     $consulta_insert->execute(array(
                        ':nombre'	=> $nombre,
                        ':apellido'=>$apellido,
                        ':telefonos'=>$telefono,
                        ':ciudad'=>$ciudad,
                        ':correo'=>$correo

                     ));

                     header('Location: index.php');

                }

            }else{

                echo"<script> alert('Los campos esatn vacios') </script>";
            }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>

    <div class="contenedor">

       
        <form class="formulario" action="" method="post">
        <br>
        <h3>Welcome!</h3>
        <br>
        
        <h5>¡Ya puedes registrar a tus usuarios!</h5>
        <div class="contenedor-campos">

            <div class="campos">
                    
                    <input type="text" name="nombre" placeholder="Your name!" class="inputtext" >
                   
            </div>

            <div class="campos">
            
                <input type="text" name="apellido" placeholder="Your lats name!" class="inputtext">

            </div>

            <div class="campos">
                
                    <input type="text" name="telefono" placeholder="Number Phone" class="inputtext" >
                   

            </div>

            <div class="campos">
            
            <input type="text" name="ciudad" placeholder="Where are Your from?" class="inputtext">
            </div>

            <div class="campos">
           
                    <input type="text" name="correo" placeholder="Example@hotmail.com" class="inputtext">

            </div>

        </div>

            <div class="btn-">

                <a href="index.php" class="btn-danger">Cancelar</a>
                <input type="submit" value="Guardar" name="guardar" class="btn-guardar">

            </div>
        



        </form>

    </div>
    
</body>
</html>