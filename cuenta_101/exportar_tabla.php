<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css" </head>
</head>

<body>
    <h1>cuenta numero 101</h1>
    <br><br><br>
    <a href="index.php" class="boton">Volver</a>


    <?php
    include "database.php";
    $datos = $con->query("select * from person");

    //if ($datos->num_rows > 0) : 
    ?>

    <h3>Datos</h3>
    <p>Resultados <?php echo $datos->num_rows; ?></p>
    <table border="1">
        <thead>
            <th>Cuenta</th>
            <th>Referencia</th>
            <th>Cupon</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Importe</th>
            <th>Peaje</th>

        </thead>
        <?php while ($d = $datos->fetch_object()) : ?>
            <tr>
                <?php
                if ($d->cc == 101) {
                ?>
                    <td><?php echo $d->cc ?></td>
                    <td><?php echo $d->no; ?></td>
                    <th><?php echo $d->traslado; ?></th>
                    <?php
                    $cadena = $d->completado;
                    list($fecha, $hora) = explode(' ', $cadena);

                    ?>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $hora; ?></td>
                    <td><?php echo $d->total; ?></td>
                    <td><?php echo $d->peaje ?></td>
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
                    $sql = "INSERT INTO cuenta_101 (REFERENCIA, CUPON, FECHA, HORA, IMPORTE, PEAJE) VALUES ('$referencia', '$cupon', '$fecha', '$hora', '$total', '$peaje')";

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