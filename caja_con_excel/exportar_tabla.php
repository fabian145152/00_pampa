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


    <?php
    include "database.php";
    $datos = $con->query("select * from caja_remis ");

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
            <th>Adicional</th>
            <th>Plus</th>
            <th>Monto Total</th>


        </thead>
        <?php while ($d = $datos->fetch_object()) : ?>
            <tr>
                <?php $unidad = $d->email1;
                $movil = substr($unidad, 1);
                if ($unidad < 3000) {


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
                    <td><?php echo $d->adicional ?></td>
                    <td><?php echo $d->plus ?></td>
                    <?php
                    $cuenta = $d->reloj + $d->equipaje + $d->adicional + $d->plus;
                    ?>
                    <td><?php echo $cuenta ?></td>
                    <td><?php echo $veinticincoporciento = $cuenta * 0.25 ?></td>
                    <?php $baet = $cuenta - $veinticincoporciento  ?>
                    <td><?php echo $utilchof = $baet / 2 + $d->peaje ?></td>
                    <td><?php echo $util = $baet / 2  ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
            $cuenta = $d->cc;
            $referencia = $d->traslado;
            $cupon = $d->no;
            $total = $d->total;
            $peaje = $d->peaje;


            $servername = "localhost";
            $username = "root";
            $password = "belgrado";
            $dbname = "apampa";


        // Crear una conexión
        /*
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Error de conexión: " . $conn->connect_error);
                    }

                    // Variables con los valores a insertar

                    $referencia;
                    $cupon;
                    $fecha;
                    $hora;
                    $total;
                    $peaje;

                    // Crear la consulta de inserción
                    $sql = "INSERT INTO voucher_remis (REFERENCIA, CUPON, FECHA, HORA, IMPORTE, PEAJE) VALUES ('$referencia', '$cupon', '$fecha', '$hora', '$total', '$peaje')";

                    // Ejecutar la consulta
                    if ($conn->query($sql) === TRUE) {
                        //echo "Datos insertados correctamente.";
                    } else {
                        echo "Error al insertar datos: " . $conn->error;
                    }

                    // Cerrar la conexión
                    $conn->close();
*/

        endwhile;
        include "export_excel.php";
        ?>

</body>

</html>