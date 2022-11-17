<?php

    include_once'conexion.php';

    if (isset($_POST['guardar'])) {
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $ciudad=$_POST['ciudad'];
        $correo=$_POST['correo'];

            if (!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($correo) && !empty($ciudad)){

                if (!filter_var($correo, FILTER_VALIDATE_EMAIL) {
                    echo "<script> alert('Correo no valido') </script>";
                }else{

                    $consulta_insert=$con->prepare('INSERT INTO usuario (nombre,apellidos,telefono,ciudad,correo)
                     VALUES (:nombre,:apellido,:telefonos,:ciudad,:correo)');
                     $consulta_insert->execute(array(
                        ':nombre'	=> $nombre,
                        ':apellido'=>$apellido,
                        ':telefonos'=>$telefono,
                        ':ciudad'=>$ciudad,
                        ':correo'=>$ciudad

                     ));
                     header('Location: index.php');

                }

            }else{

                echo"<script> alert('Los campos esatn vacios') </script>";
            }

    }

?>