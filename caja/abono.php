<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css">
</head>

<body>

    <?php

    include("../includes/conexion.php");
    ?>
    <h1><span class="subtitulo">Abonos</span></h1>
    <br>
    <a href="../index.php" class="boton">Salir</a>
    <br>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> method=´post ">
        <table width="60%" border="0" align="center">

            <td class="primera_fila">ID</td>
            <td class="primera_fila">Movil</td>
            <td class="primera_fila">Descripcion</td>
            <td class="primera_fila">Importe</td>
            <td class="sin">&nbsp;</td>
            <td class="sin">&nbsp;</td>

            <?php

            $registros = $base->query(
                "SELECT * FROM `abonos` WHERE 1"
            )->fetchAll(PDO::FETCH_OBJ);

            foreach ($registros as $abonos) :

            ?>
                <tr>
                    <td><?php echo $abonos->id_abono ?></td>
                    <td><?php echo $abonos->movil_abono ?></td>

                    <td><?php echo $abonos->descripcion ?></td>
                    <td><?php echo "$" . $abonos->abono . "-" ?></td>

                    <td><a href="borrar.php?id_abono=<?php echo $abonos->id_abono ?>">
                            <input type='button' name='del' id='del' value='Borrar' class='boton'></a></td>
                    <td><a href="editar.php?id_abono=<?php echo $abonos->id_abono ?> 
                                    & movil_abono=<?php echo $abonos->movil_abono ?> 
                                    & descripcion=<?php echo $abonos->descripcion ?>
                                    & abono=<?php echo $abonos->abono ?> 
                                    ">
                            <input type='button' name='bot_actualizar' id='bot_actualizar' value='Actualizar' class='boton'></a></td>
                </tr>

            <?php
            endforeach
            ?>

            <br>



            <td><input type="text" name='Id_abono' size='3' class='centrado'></td>
            <td><input type='text' name='Movil_abono' size='5' class='centrado'></td>
            <td><input type='text' name='descripcion' size='10' class='centrado'></td>
            <td><input type='text' name='abono' size='10' class='centrado'></td>
            <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar' class='boton'></td>
        </table>
    </form>
</body>

</html>