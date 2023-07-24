<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detalles.css">
</head>
<title>Document</title>
</head>

<body>

    <?php
    include("../includes/conexion.php");

    if (isset($movil)) {
        $movil = $_POST['movil'];
        echo $movil;
        echo "<br>";
    } else {
        $removil = $_POST['movil'];
        echo $removil;
    }

    $movil = $_GET['q'];
    $viaje = $_GET['v'];

    echo $movil;
    echo $viaje;

    $num_mov = "A" . $removil;

    ?>
    <h1><?php echo $num_mov ?></h1>
    <a href="../caja/inicio.php" class="boton" required autofocus>Salir</a>

    <?php

    $saldo = $base->query("SELECT `sheet1`.`Id` as Viaje,
                                  `sheet1`.`Móvil`as movil,
                                  `sheet1`.`Origen`as Origen,
                                  `sheet1`.`Dirección Destino`as Destino,
                                  `sheet1`.`Nombre Pasajero` as Nombre,
                                  `sheet1`.`Cuenta corriente`as cuenta,
                                  `sheet1`.`Traslado`as traslado,
                                  `sheet1`.`Siniestro`as siniestro,
                                  `sheet1`.`Fecha completado`as completado,
                                  `sheet1`.`Reloj`as reloj,
                                  `sheet1`.`Peaje`as peaje,
                                  `sheet1`.`Equipaje`as equipaje,
                                  `sheet1`.`Adicional`as adicional,
                                  `sheet1`.`Plus`as plus,
                                  `sheet1`.`Monto total`as monto
                                            FROM `sheet1`
                                            WHERE Móvil = '$num_mov' ")->fetchAll(PDO::FETCH_OBJ);

    ?>

    <table width="100%" border="0" align="center">
        <tr>
            <td class="primera_fila">Viaje</td>
            <td class="primera_fila">Movil</td>
            <td class="primera_fila">Origen</td>
            <td class="primera_fila">Destino</td>
            <td class="primera_fila">Nombre de Pasajero</td>
            <td class="primera_fila">Cuenta</td>
            <td class="primera_fila">Traslado</td>
            <td class="primera_fila">Siniestro</td>
            <td class="primera_fila">Fecha/Hora</td>
            <td class="primera_fila">Reloj</td>
            <td class="primera_fila">Peaje</td>
            <td class="primera_fila">Equipaje</td>
            <td class="primera_fila">Adicional</td>
            <td class="primera_fila">Plus</td>
            <td class="primera_fila">Total</td>
        </tr>

        <?php
        foreach ($saldo as $mov) :
        ?>
            <tr>
                <td size="250px"><?php echo $mov->Viaje ?></td>
                <td><?php echo $mov->movil ?></td>
                <td><?php echo $mov->Origen ?></td>
                <td><?php echo $mov->Destino ?></td>
                <td><?php echo $mov->Nombre ?></td>
                <td><?php echo $mov->cuenta ?></td>
                <td><?php echo $mov->traslado ?></td>
                <td><?php echo $mov->siniestro ?></td>
                <td><?php echo $mov->completado ?></td>
                <td><?php echo $mov->reloj ?></td>
                <td><?php echo $mov->peaje ?></td>
                <td><?php echo $mov->equipaje ?></td>
                <td><?php echo $mov->adicional ?></td>
                <td><?php echo $mov->plus ?></td>
                <td><?php echo $mov->monto ?></td>
                <td><a href="editar.php?viaje='<?php echo $mov->Viaje ?>' ">Editar</a></td>
                <td><a href="guarda_viaje.php?viaje='<?php echo $mov->Viaje  ?>' ">Guardar</a></td>

            </tr>

        <?php

        endforeach;

        ?>

    </table>

</body>

</html>