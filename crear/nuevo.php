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
<a href="ayuda_crear.php" target="_blank" class="boton">AYUDA</a>
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
       // $nombre_chofer = $_POST['nombre_chofer'];
       // $dir_chofer = $_POST['dir_chofer'];
       // $cp_chofer = $_POST['cp_chofer'];
       // $cel_chofer = $_POST['cel_chofer'];
       // $dni_chofer = $_POST['dni_chofer'];
       // $email_chofer = $_POST['email_chofer'];
        $marca_unidad = $_POST['marca_unidad'];
        $modelo_unidad = $_POST['modelo_unidad'];
        $year_unidad = $_POST['year_unidad'];
        $dominio_unidad = $_POST['dominio_unidad'];
        $categoria_unidad = $_POST['categoria_unidad'];
        $abono_unidad = $_POST['abono_unidad'];


        //  date_format(fecha_ini, '%d-%m-%Y') AS fecha_ini,

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
                                       /* nombre_chofer, 
                                        dir_chofer, 
                                        cp_chofer, 
                                        cel_chofer, 
                                        dni_chofer,
                                        email_chofer, */
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
                                  /*  :nombre_chofer, 
                                    :dir_chofer,
                                    :cp_chofer, 
                                    :cel_chofer, 
                                    :dni_chofer, 
                                    :email_chofer, */
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
            // ":nombre_chofer" => $nombre_chofer,
            // ":dir_chofer" => $dir_chofer,
            // ":cp_chofer" => $cp_chofer,
            // ":cel_chofer" => $cel_chofer,
            // ":dni_chofer" => $dni_chofer,
            // ":email_chofer" => $email_chofer,
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
   
    <br>
    <a href="inicio.php" class="boton">Volver</a>

    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <table width="65%" border="0" align="center" class="">
            <td>
                <tr>
                    <td>

                        <h1>Datos Titular</h1>
                    </td>

                </tr>
                <tr>
                    <td><label for="movil">Movil</label>
                    <td><label for="movil"></label>
                        <input type="text" name="movil" id="movil">
                    </td>
                </tr>
                <tr>
                    <td><label for="fecha_ini">Fecha de inicio</label>
                    <td><label for="fecha_ini"></label>
                        <input type="date" name="fecha_ini" id="fecha_ini">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="tropa" name="tropa" value="tropa" require>
                        <label for="tropa">TROPA</label><br>
                        <input type="radio" id="tropa" name="tropa" value="titular" require>
                        <label for="tropa">TITULAR</label><br>
                    </td>
                </tr>
                <tr>
                    <td><label for="nombre_titular">Nombre del Titular / Tropa</label>
                    <td><label for="nombre_titular"></label>
                        <input type="" name="nombre_titular" id="nombre_titular">
                        <!-- si le agrego en el input un value="cualquier cosa"
                            y abajo un <input type="reset"> me aparece un botor de reestablecer y me borra todos los campos  -->
                    </td>
                </tr>
                <tr>
                    <td><label for="dir_titular">Direccion</label>
                    <td><label for="dir_titular"></label>
                        <input type="text" name="dir_titular" id="dir_titular">
                    </td>
                </tr>
                <tr>
                    <td><label for="cp_titular">Cp</label>
                    <td><label for="cp_titular"></label>
                        <input type="text" name="cp_titular" id="cp_titular">
                    </td>
                </tr>
                <tr>
                    <td><label for="cel_titular">Celular</label>
                    <td><label for="cel_titular"></label>
                        <input type="text" name="cel_titular" id="cel_titular">
                    </td>
                </tr>
                <tr>
                    <td><label for="dni_titular">DNI</label>
                    <td><label for="dni_titular"></label>
                        <input type="text" name="dni_titular" id="dni_titular">
                    </td>
                </tr>
                <tr>
                    <td><label for="email_titular">E-mail</label>
                    <td><label for="email_titular"></label>
                        <input type="email" name="email_titular" id="email_titular">
                    </td>
                </tr>
                <br>
                <tr>
                    <td><label for="licencia_titular">Licencia</label>
                    <td><label for="licencia_titular"></label>
                        <input type="text" name="licencia_titular" id="licencia_titular">
                    </td>
                </tr>

            
                <tr>
                    <td>
                        <h1>Datos Unidad</h1>
                    </td>
                </tr>
                <tr>
                    <td><label for="marca_unidad">Marca Unidad</label>
                    <td><label for="marca_unidad"></label>
                        <input type="text" name="marca_unidad" id="marca_unidad">
                    </td>
                </tr>
                <tr>
                    <td><label for="modelo_unidad">Modelo</label>
                    <td><label for="modelo_unidad"></label>
                        <input type="text" name="modelo_unidad" id="modelo_unidad">
                    </td>
                </tr>
                <tr>
                    <td><label for="year_unidad">Año</label>
                    <td><label for="year_unidad"></label>
                        <input type="text" name="year_unidad" id="year_unidad">
                    </td>
                </tr>
                <tr>
                    <td><label for="dominio_unidad">Dominio</label>
                    <td><label for="dominio_unidad"></label>
                        <input type="text" name="dominio_unidad" id="dominio_unidad">
                    </td>
                </tr>
                <tr>
                    <td><label for="categoria_unidad">Categoria</label>
                    <td><label for="categoria_unidad"></label>
                        <select name="categoria_unidad" id="categoria_unidad">
                            <option value="">Elija</option>
                            <option value="PORTEÑO">PORTEÑO</option>
                            <option value="BSAS">BUENOS AIRES</option>
                            <option value="PAMPA">PAMPA</option>
                            <option value="BAET">BAET</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="reset"></td>
                    <td><input type="submit" name="bot_nuevo" id="bot_nuevo" value="Crear"></td>
                </tr>
                <tr>

                    <td>
                        <br><br>

                    </td>
                </tr>
                <tr>
                    <td><a href="1_chof.php" class="boton">1 Chofer</a></td>
                    <td><a href="2_chof.php" class="boton">2 Choferes</a></td>
                </tr>
            </td>

        </table>
</body>

</html>