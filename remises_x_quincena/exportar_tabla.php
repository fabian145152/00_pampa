<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css" </head>
</head>

<body>
    <br><br>
    <a href="inicio_caja.php" class="boton">Volver</a>
    <!--
    <form action="pagina_busqueda.php" method="get">
        <label>Buscar:<input type="text" name="movil"></label>
        <input type="submit" name="enviando" value="Dale!">
    </form>
-->

    <?php
    include "database.php";
    $datos = $con->query("SELECT * FROM caja_remis ORDER BY email1 && no ASC ");

    //if ($datos->num_rows > 0) : 
    ?>

    <h3>Datos</h3>
    <p>Resultados <?php echo $datos->num_rows; ?></p>
    <table border="1">
        <thead>

            <th>Movil</th>
            <th>Nombre del pasajero</th>
            <th>Fecha Solicitado</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Centro de costo</th>
            <th>Id</th>
            <th>Reloj</th>
            <th>Peaje</th>
            <th>Equipaje</th>
            <th>Monto Total</th>

        </thead>
        <?php while ($d = $datos->fetch_object()) : ?>
            <tr>
                <?php $unidad = $d->email1;
                $movil = substr($unidad, 1);
                if ($movil  > 2999 && $movil < 4000) {


                ?>
                    <td><?php echo $movil ?></td>
                    <td><?php echo $d->address1 ?></td>
                    <td><?php echo $d->solicitado ?></td>
                    <td><?php echo $d->name ?></td>
                    <td><?php echo $d->destino; ?></td>
                    <td><?php echo $d->centro_de_costo ?></td>
                    <td><?php echo $d->no ?></td>
                    <td><?php echo $d->reloj ?></td>
                    <td><?php echo $d->peaje ?></td>
                    <td><?php echo $d->equipaje ?></td>
                    <td><?php echo $total = $d->reloj + $d->peaje + $d->equipaje ?></td>



                    <?php

                    ?>


                <?php
                }
                ?>
            </tr>
        <?php

            if ($movil  > 2999 && $movil < 4000) {


                $servername = "localhost";
                $username = "root";
                $password = "belgrado";
                $dbname = "apampa";


                // Crear una conexión

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }



                $movil;
                $nombre = $d->address1;
                $fecha = $d->solicitado;
                $origen = $d->name;
                $destino = $d->destino;
                $centro = $d->centro_de_costo;
                $viaje = $d->no;
                $reloj = $d->reloj;
                $peaje = $d->peaje;
                $equipaje = $d->equipaje;
                $monto_total = $reloj + $peaje + $equipaje;



                // Crear la consulta de inserción
                $sql = "INSERT INTO voucher_x_movil(movil, nombre, fecha, origen, destino, centro_de_costo, viaje, reloj, peaje, equipaje, monto_total) 
            VALUES ('$movil', '$nombre', '$fecha', '$origen', '$destino', '$centro', '$viaje', '$reloj', '$peaje', '$equipaje','$monto_total')";

                // Ejecutar la consulta
                if ($conn->query($sql) === TRUE) {
                    //echo "Datos insertados correctamente.";
                } else {
                    echo "Error al insertar datos: " . $conn->error;
                }

                // Cerrar la conexión
                $conn->close();
            }
        endwhile;

        include "export_excel.php";
        ?>

</body>

</html>