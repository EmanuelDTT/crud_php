<?php
    include_once 'conexion.php';

        $sentencia_select=$con->prepare('SELECT * FROM usuario ORDER BY id DESC');
        $sentencia_select->execute();
        $resultado=$sentencia_select->fetchAll();

        //metodo de busqueda
    if (isset($_POST['btn_buscar'])) {

        $buscar_text=$_POST['buscar'];
        $select_buscar=$con->prepare('SELECT * FROM usuario WHERE nombre LIKE :campo OR apellidos LIKE :campo;'
    );
    $select_buscar->execute(array(

        ':campo'=>"%".$buscar_text."%"
    ));
        $resultado=$select_buscar->fetchAll();
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

        <div class="container">


        <div class="barra-buscar"> 
                <form action="" class="formu" method="post">
                    <input type="text" name="buscar" placeholder="Buscar nombre o apellidos" autocomplete="off"
                    value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input" id="texto">

                    <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                    <a href="insert.php" class="btn-nuevo">New</a>

                </form>

                <h3>Hello!</h3> <br><br>
            <h5>En este Pequeño formulario web puedes encontrar multiples tareas <br>
            Ingresa, actualiza, Elimina y busca a tus usuarios en tu base de datos</h5>

        </div>
            

            

            

      

        <table >
            <tr class="head">
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Telefono</td>
                <td>Ciudad</td>
                <td>Correo</td>
                <td colspan="2"><center>Opciones</center></td>
            </tr>

            <?php foreach($resultado as $fila): ?>
                <tr>
                    <td><b> <?php echo $fila['id']; ?></b></td>
                    <td> <?php echo $fila['nombre'];  ?></td>
                    <td> <?php echo $fila['apellidos']; ?> </td>
                    <td> <?php echo $fila['telefono']; ?> </td>
                    <td> <?php echo $fila['ciudad']; ?> </td>
                    <td> <?php echo $fila['correo']; ?> </td>
                    <td> <a href="update.php?id= <?php echo $fila['id']; ?>" class="btn-update">Editar</a></td>
                    <td> <a href="delete.php?id= <?php echo $fila['id']; ?>" class="btn-delete">Eliminar</a></td>
                    

                </tr>
                <?php endforeach ?> 
            </table>

        </div>
</body>
</html>


