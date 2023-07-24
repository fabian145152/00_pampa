<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            background-color: #e5e5e5;
        }

        .boton {
            padding: 4px 25px;
            background: rgb(19, 143, 247);
            border: 1px solid #1161B0;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <?php

    include("../includes/conexion.php");

    if (!isset($_POST['bot_nuevo'])) {

        echo "<br>";
    } else {
        $tropa = $_POST['tropa'];
        $fecha_ini = $_POST['fecha_ini'];
        $movil = $_POST['movil'];
        $nombre_titular = $_POST['nombre_titular'];
        $dir_titular = $_POST['dir_titular'];
        $cp_titular = $_POST['cp_titular'];
        $cel_titular = $_POST['cel_titular'];
        $dni_titular = $_POST['dni_titular'];
        $email_titular = $_POST['email_titular'];
        $licencia_titular = $_POST['licencia_titular'];
        $nombre_chofer = $_POST['nombre_chofer'];
        $dir_chofer = $_POST['dir_chofer'];
        $cp_chofer = $_POST['cp_chofer'];
        $cel_chofer = $_POST['cel_chofer'];
        $dni_chofer = $_POST['dni_chofer'];
        $email_chofer = $_POST['email_chofer'];
        $marca_unidad = $_POST['marca_unidad'];
        $modelo_unidad = $_POST['modelo_unidad'];
        $year_unidad = $_POST['year_unidad'];
        $dominio_unidad = $_POST['dominio_unidad'];
        $categoria_unidad = $_POST['categoria_unidad'];
        $abono_unidad = $_POST['abono_unidad'];


        $sql = "INSERT INTO unidades (fecha_ini,
                                        tropa, 
                                        movil, 
                                        nombre_titular, 
                                        dir_titular, 
                                        cp_titular, 
                                        cel_titular, 
                                        dni_titular, 
                                        email_titular, 
                                        licencia_titular,
                                        nombre_chofer, 
                                        dir_chofer, 
                                        cp_chofer, 
                                        cel_chofer, 
                                        dni_chofer,
                                        email_chofer,
                                        marca_unidad,
                                        modelo_unidad,
                                        year_unidad,
                                        dominio_unidad,
                                        categoria_unidad,
                                        abono_unidad) 
                             VALUES (:fecha_ini,
                                    :tropa,
                                    :movil,
                                    :nombre_titular, 
                                    :dir_titular, 
                                    :cp_titular, 
                                    :cel_titular, 
                                    :dni_titular, 
                                    :email_titular, 
                                    :licencia_titular,
                                    :nombre_chofer, 
                                    :dir_chofer,
                                    :cp_chofer, 
                                    :cel_chofer, 
                                    :dni_chofer, 
                                    :email_chofer, 
                                    :marca_unidad,
                                    :modelo_unidad,
                                    :year_unidad,
                                    :dominio_unidad,
                                    :categoria_unidad,
                                    :abono_unidad)";

        $resultado = $base->prepare($sql);

        $resultado->execute(array(
            ":fecha_ini" => $fecha_ini,
            ":tropa" => $tropa,
            ":movil" => $movil,
            ":nombre_titular" => $nombre_titular,
            ":dir_titular" => $dir_titular,
            ":cp_titular" => $cp_titular,
            ":cel_titular" => $cel_titular,
            ":dni_titular" => $dni_titular,
            ":email_titular" => $email_titular,
            ":licencia_titular" => $licencia_titular,
            ":nombre_chofer" => $nombre_chofer,
            ":dir_chofer" => $dir_chofer,
            ":cp_chofer" => $cp_chofer,
            ":cel_chofer" => $cel_chofer,
            ":dni_chofer" => $dni_chofer,
            ":email_chofer" => $email_chofer,
            ":marca_unidad" => $marca_unidad,
            ":modelo_unidad" => $modelo_unidad,
            ":year_unidad" => $year_unidad,
            ":dominio_unidad" => $dominio_unidad,
            ":categoria_unidad" => $categoria_unidad,
            ":abono_unidad" => $abono_unidad
        ));
        header("location:inicio.php");
    }

    ?>


    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <a href="nuevo.php" class="boton">Volver</a>
        <table width="65%" border="0" align="center" class="">
            <td>



                <tr>
                    <td><label for="nombre_chofer">Nombre del Chofer</label>
                    <td><label for="nombre_chofer"></label>
                        <input type="text" name="nombre_chofer" id="nombre_chofer">
                    </td>
                </tr>
                <tr>
                    <td><label for="dir_chofer">Direccion</label>
                    <td><label for="dir_chofer"></label>
                        <input type="text" name="dir_chofer" id="dir_chofer">
                    </td>
                </tr>
                <tr>
                    <td><label for="cp_chofer">Cp</label>
                    <td><label for="cp_chofer"></label>
                        <input type="text" name="cp_chofer" id="cp_chofer">
                    </td>
                </tr>
                <tr>
                    <td><label for="cel_chofer">Celular</label>
                    <td><label for="cel_chofer"></label>
                        <input type="text" name="cel_chofer" id="cel_chofer">
                    </td>
                </tr>
                <tr>
                    <td><label for="dni_chofer">DNI</label>
                    <td><label for="dni_chofer"></label>
                        <input type="text" name="dni_chofer" id="dni_chofer">
                    </td>
                </tr>
                <tr>
                    <td><label for="email_chofer">E-mail</label>
                    <td><label for="email_chofer"></label>
                        <input type="email" name="email_chofer" id="email_chofer">
                    </td>
                </tr>

                <tr>
                    <td><label for="abono_unidad">Abono</label>
                    <td><label for="abono_unidad"></label>
                        <input type="text" name="abono_unidad" id="abono_unidad">
                    </td>
                </tr>
                <tr>
                    <td><input type="reset"></td>
                    <td><input type="submit" name="bot_nuevo" id="bot_nuevo" value="Crear"></td>
                </tr>
            </td>

        </table>
        <a href="inicio.php" class="boton">Salir</a>
    </form>
</body>

</html>