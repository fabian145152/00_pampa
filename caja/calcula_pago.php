<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/detalles.css">
    <link rel="stylesheet" type="text/css" href="../css/tabla.css">

</head>

<body>
    <?php

    $haber = $_POST['pago'];
    $movil = $_POST['movil'];



    include("../includes/conexion.php");
    include("../functions/semana.php");

    $a = 0;
    $b = 1;
    /*
    $saldo = $base->query("SELECT id, 
                movil_caja, 
                fecha, deber, 
                haber, saldo 
                            FROM caja_cont 
                            WHERE movil_caja = $movil ORDER BY id DESC LIMIT $a,$b 
                    ")->fetchAll(PDO::FETCH_OBJ);
*/

    //------------------------------------------
    // ver COUNT
    //------------------------------------------


    $saldo = $base->query("SELECT
    caja_cont.id,
    caja_cont.movil_caja,
    caja_cont.fecha,
    caja_cont.deber,
    caja_cont.haber,
    caja_cont.saldo,
    abonos.movil_abono,
    abonos.abono
FROM
    caja_cont,
    abonos WHERE movil_caja = $movil ORDER BY id DESC LIMIT 1

                    ")->fetchAll(PDO::FETCH_OBJ);

    foreach ($saldo as $mov) :

    ?>
        <tr>
            <?php $id = $mov->id; ?>
            <td><?php $uni = $mov->movil_caja ?></td>
            <td><?php $abono_semanal = $mov->abono ?></td>
            <td><?php $fe = $mov->fecha ?></td>
            <td><?php $deb = $mov->deber ?></td>
            <td><?php $hab = $mov->haber ?></td>
            <td><?php $sal = $mov->saldo ?></td>
            <br>
            <td><?php echo "Movil: " . $movil ?></td>
            <br>
            <td><?php echo "Abono: " . $abono_semanal ?></td>
            <br>
            <td><?php echo "Debe: " . $deb ?></td>
            <br>
            <td><?php echo "Depositó: " . $haber ?></td>
            <br>
            <td><?php $saldo = $deb - $haber + $abono_semanal ?></td>

            <td><?php $fecha_hoy = date('Y-m-d');
                echo "Fecha: " . $fecha_hoy . "<br>"; ?></td>

            <td><?php echo "Deuda: " . $saldo; ?></td>

        </tr>
    <?php

    endforeach;

    

    $nuevo_reg = "INSERT INTO caja_cont (movil_caja, fecha, deber, haber, saldo) 
    VALUES (:miMovil, 
            :miFecha, 
            :miDebe,
            :miHaber,
            :miSaldo
            ) ";

    $resultado = $base->prepare($nuevo_reg);

    $resultado->execute(array(
        ":miMovil" => $movil,
        ":miFecha" => $fecha_hoy,
        ":miDebe" => $deb,
        ":miHaber" => $haber,
        ":miSaldo" => $saldo
    ));

    //header("Location:listado.php?q=$movil");

    ?>

    <a href='<?php //$_SERVER["HTTP_REFERER"]
                ?>' class="boton">Volver</a>

</body>

</html>