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
            <h2>Busqueda de usuario</h2>
            <div class="barra-buscar"> 
                <form action="" class="formu" method="post">
                    <input type="text" name="buscar" placeholder="buscar nombre o apellidos"
                    value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input">

                    <input type="submit" class="btn" name="btn_buscar" value="buscar">
                    <a href="insert.php" class="btn-nuevo">Nuevo registro</a>

                </form>
            </div>

      

        <table >
            <tr class="head">
                <td>Id</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Telefono</td>
                <td>Ciudad</td>
                <td>Correo</td>
                <td colspan="2">Acciónes</td>
            </tr>

            <?php foreach($resultado as $fila): ?>
                <tr>
                    <td> <?php echo $fila['id']; ?></td>
                    <td> <?php echo $fila['nombre'];  ?></td>
                    <td> <?php echo $fila['apellidos']; ?> </td>
                    <td> <?php echo $fila['telefono']; ?> </td>
                    <td> <?php echo $fila['ciudad']; ?> </td>
                    <td> <?php echo $fila['correo']; ?> </td>
                    <td> <a href="update.php?id= <?php echo $fila['id']; ?>" class="btn-update"></a> Editar</td>
                    <td> <a href="delete.php?id= <?php echo $fila['id']; ?>" class="btn-delete"></a> Eleminar</td>
                    

                </tr>
                <?php endforeach ?> 
            </table>

        </div>
</body>
</html>


