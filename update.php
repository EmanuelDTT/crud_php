<?php
    include_once 'conexion.php';

    if (isset($_GET['id'])) {
        $id=(int) $_GET['id'];

        $buscar_id=$con->prepare('SELECT * FROM  usuario WHERE id=:id LIMIT 1');
        $buscar_id->execute(array(
            ':id'=>$id
        ));
            $resultado=$buscar_id->fetch();
    }else{
        header ('Location: index.php');

    }

    if(isset($_POST['guardar'])){

        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $ciudad=$_POST['ciudad'];
        $correo=$_POST['correo'];
        $id=(int) $_GET['id'];

        if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($ciudad) &&
        !empty($correo))  {
           
            if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
                echo "<script> alert('Correo no valido') </script>";
            }else{

                $consulta_insert=$con->prepare('UPDATE usuario SET
                        nombre=:nombre,
                        apellidos=:apellidos,
                        telefono=:telefono,
                        ciudad=:ciudad,
                        correo=:correo
                        WHERE id=:id;'
                        );
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
    <title>Editar Cliente</title>
</head>
<body>

    <div class="contenedor">
        <h2>Modificar registro</h2>
        <form class="formulario" action="" method="post">
        <h2>Envio de datos</h2>
        <div class="contenedor-campos">

            <div class="campos">

                    <input type="text" name="nombre" placeholder="Nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="inputtext" >
                   
            </div>

            <div class="campos">

                <input type="text" name="apellido" placeholder="Apellido"  value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="inputtext">

            </div>

            <div class="campos">

                    <input type="text" name="telefono" placeholder="Telefono"  value="<?php if($resultado) echo $resultado['telefono']; ?>" class="inputtext" >
                   

            </div>

            <div class="campos">
            <input type="text" name="ciudad" placeholder="Ciudad"  value="<?php if($resultado) echo $resultado['ciudad']; ?>" class="inputtext">
            </div>

            <div class="campos">
                    <input type="text" name="correo" placeholder="Correo electronico"  value="<?php if($resultado) echo $resultado['ciudad']; ?>" class="inputtext">

            </div>

        </div>

            <div class="btn_group">

                <a href="index.php" class="btn-danger">Cancelar</a>
                <input type="submit" value="Guardar" name="guardar" class="btn">

            </div>

    </div>
    
    
</body>
</html>






























