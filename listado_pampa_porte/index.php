<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listado Unidades</title>
    <link rel="stylesheet" type="text/css" href="hoja.css">

</head>

<body>
    <?php

    include("coneccion.php");
    // ------------------1er Paso--------------------------------
    //$conexion = $base->query("SELECT / FROM DATOS_USUARIOS");
    //$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    //la linea de abajo es simplificada
    //con esto ya conectamos a la BBDD

    //--------------------Paginacion---------------------

    $tamagno_pagina = 3;    //cantidad de registros por pagina

    //--------------Sigue aca desde abajo de todo--------------
    if (isset($_GET["pagina"])) {
        //con el isset que se ejecute una vez pulsado el promernumero, porque si no ma da que la variable pagina no esta definida.
        if ($_GET["pagina"] == 1) {

            header("Location:index.php");
        } else {

            $pagina = $_GET["pagina"];
        }
    } else {
        $pagina = 1;
    }
    //---------------------------------------------------------

    $empezar_desde = ($pagina - 1) * $tamagno_pagina;
    //si pulso el 3 pagina =3 con el metodo get, 3-1=2 y 2*3 =6
    //guardo en la variable el numero 6 para que lo sustituya en el limit
    //limit 6, 3 

    $sql_total = "SELECT * FROM unidades";
    /*
    Para paginar agrego LIMIT, 2 parametros primer registro y cantidad de registros.
    Lo primero que necesito es saber cuantos registros tiene la tabla
    y en cuantas paginas lo va a dividir.
    Creo variable $tamagno_pagina
    
    
    */
    $resultado = $base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas = $resultado->rowCount();    //cuenta la cantidad de filas
    $total_paginas = ceil($num_filas / $tamagno_pagina);  //me dice la cantidad de paginas que voy a tener
    //el ceil me da un numero entero

    //--------------------Fin Paginacion-----------------


    $registros = $base->query("SELECT * FROM unidades LIMIT $empezar_desde,$tamagno_pagina")->fetchAll(PDO::FETCH_OBJ);

    // parte del insert
    if (isset($_POST["cr"])) {
        $patente = $_POST["Pat"];
        $movil = $_POST["Mov"];
        $equipo = $_POST["Equi"];
        $serie = $_POST['Seri'];
        $estado = $_POST['Esta'];
        $licencia = $_POST['Lice'];
        $titular = $_POST['Titu'];
        //$empresa = $_POST['Emp'];

        //El id no hace falta porque es autonumerico
        $sql = "INSERT INTO unidades (patente, movil, equipo, serie, estado, licencia, titular) VALUES 
                                    (:pat, :mov, :equi, :seri, :esta, :lice, :titu )";

        $resultado = $base->prepare($sql);
        
        $resultado->execute(array(
            ":pat" => $patente,
            ":mov" => $movil,
            ":equi" => $equipo,
            ":seri" => $serie,
            ":esta" => $estado,
            ":lice" => $licencia,
            ":titu" => $titular
        ));
        header("location:index.php");
    }


    ?>


    <h1>Listado de Moviles</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Id</td>
                <td class="primera_fila">Patente</td>
                <td class="primera_fila">Movil</td>
                <td class="primera_fila">Equipo</td>
                <td class="primera_fila">Serie</td>
                <td class="primera_fila">Estado</td>
                <td class="primera_fila">Licencia</td>
                <td class="primera_fila">Titular</td>
                <Td class="primera_fila">Cedula Verde</Td>

                <!-- <td class="primera_fila">Fotos</td> -->
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>


            <!-- Esta parte es para que las lineas se repitan -->
            <?php
            //--------------------------------------------------------------------------
            // Esta parte es del READ
            foreach ($registros as $persona) :
                /*
            Este es el array donde tengo almacenados todos los objetos de mi BBDD
            $persona es una variable cualquiera
            */
                //-----------------------------------------------------------------------
            ?>

                <tr>
                    <td><?php echo $persona->id ?> </td>
                    <td><?php echo $persona->patente ?></td>
                    <td><?php echo $persona->movil ?></td>
                    <td><?php echo $persona->equipo ?></td>
                    <td><?php echo $persona->serie ?></td>
                    <td><?php echo $persona->estado ?></td>
                    <td><?php echo $persona->licencia ?></td>
                    <td><?php echo $persona->titular ?></td>



                    <td class="boton"><a href="borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>


                    <td class='boton'><a href="editar.php?id=<?php echo $persona->id
                                                                ?> & pat=<?php echo $persona->patente ?> 
                                                           & mov=<?php echo $persona->movil ?> 
                                                           & equi=<?php echo $persona->equipo ?>
                                                           & seri=<?php echo $persona->serie ?>
                                                           & esta=<?php echo $persona->estado ?>
                                                           & lice=<?php echo $persona->licencia ?>
                                                           & titu=<?php echo $persona->titular ?>
                                                      
                                                           ">

                            <input type='button' name='up' id='up' value='Actualizar'></a></td>
                    <!-- ------------------------------ -->
                </tr>
            <?php
            // READ-------------------------------------------------------------------------------------
            endforeach;
            //Otra forma de hacerlo es concatenando todo para que quede php dentro de cada linea de html
            //------------------------------------------------------------------------------------------

            ?>

            <!-- Esta es la parte del insert con la linea <form action=" <?php //echo $_SERVER['PHP_SELF']; 
                                                                            ?>" method="post">-->
            <tr>
                <td></td>
                <td><input type='text' name='Pat' size='10' class='centrado'></td>
                <td><input type='text' name='Mov' size='8' class='centrado'></td>
                <td><input type='text' name='Equi' size='10' class='centrado'></td>
                <td><input type='text' name='Seri' size='10' class='centrado'></td>
                <td><input type='text' name='Esta' size='10' class='centrado'></td>
                <td><input type='text' name='Lice' size='10' class='centrado'></td>
                <td><input type='text' name='Titu' size='20' class='centrado'></td>
                <td><input type='text' name='Emp' size='10' class='centrado'></td>

                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            <tr>
                <td>

                    <?php

                    // --------------------------------------------------------
                    //aca empieza la parte de abajo con los numeros y saltos de pagina
                    echo "<br>";
                    for ($i = 1; $i <= $total_paginas; $i++) {

                        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
                        //$i tiene que ser un link y lo paso por la url


                    }


                    ?>

                </td>
            </tr>
            </tr>
        </table>
    </form>

    <a href="../index.php" class="boton">Salir</a>

    <p>&nbsp;</p>
</body>

</html>