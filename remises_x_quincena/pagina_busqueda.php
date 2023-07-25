<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hola</h1>
    <br>
    <?php $movil = $_GET['movil'];
    echo $movil;

    ?>
    <a href="exportar_tabla.php">Volver</a>
    <br><br>
    <?php
    include "database.php";

    ?>
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
        <?php

        $datos = $con->query("SELECT * FROM `voucher_x_movil` WHERE movil = '3021' ");
        echo  $datos->num_rows . " Registros";

        while ($d = $datos->fetch_object()) :
        ?>
            <tr>

                <td><?php echo $movil ?></td>
                <td><?php echo $d->nombre ?></td>
                <td><?php echo $d->fecha ?></td>
                <td><?php echo $d->origen ?></td>
                <td><?php echo $d->destino ?></td>
                <td><?php echo $d->centro_de_costo; ?></td>
                <td><?php echo $d->viaje ?></td>
                <td><?php echo $d->reloj ?></td>
                <td><?php echo $d->peaje ?></td>
                <td><?php echo $d->equipaje ?></td>
                <td><?php echo $d->monto_total ?></td>

            </tr>

        <?php
        endwhile;

        ?>
</body>

</html>