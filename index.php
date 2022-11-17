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

        <h2>Envio de datos</h2>
        <form action="" method="post">

            <div class="grupo">


                    <input type="text" name="nombre" placeholder="Nombre" class="inputtext" >
                    <input type="text" name="apellido" placeholder="Apellido" class="inputtext">

            </div>

            <div class="grupo">

                    <input type="text" name="telefono" placeholder="Telefono" class="inputtext" >
                    <input type="text" name="ciudad" placeholder="Ciudad" class="inputtext">

            </div>

            <div class="grupo">
                    <input type="text" name="correo" placeholder="Correo electronico" class="inputtext">

            </div>

            <div class="btn-grupo">

                <a href="index.php" class="btn-danger">Cancelar</a>
                <input type="submit" value="Guardar" name="guardar" class="btn-primary">

            </div>




        </form>

    </div>
    
</body>
</html>