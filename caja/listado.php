<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css">
    <link rel="stylesheet" type="text/css" href="../css/tabla.css">
</head>

<body>

    <?php

    $movil = $_GET['q'];
    $viaje = $_GET['v'];



    include("../includes/conexion.php");

    ?>

    <h2>Unidad: <?php echo $movil ?></h2>
    <h2>Viaje: <?php echo $viaje ?></h2>
    <?php
    //die();

    $saldo = $base->query("SELECT movil_caja, fecha, deber, haber, saldo FROM caja_cont WHERE movil_caja = $movil")->fetchAll(PDO::FETCH_OBJ);

    foreach ($saldo as $mov) :
    ?>
        <table>
            <tr>
                <?php //"Movil:" . $mov->movil_caja 
                ?>
                <th><?php echo "Fecha Cobro:" . $mov->fecha ?></th>
                <th><?php echo "Debe:" . $mov->deber ?></th>
                <th><?php echo "Haber:" . $mov->haber ?></th>
                <th><?php echo "Saldo: " . $mov->saldo ?></th>
            </tr>
        </table>
    <?php
    endforeach;


    $registros = $base->query("SELECT
                    unidades.id,
                    unidades.movil,               
                    unidades.fecha_ini,
                    unidades.tropa,
                    unidades.nombre_titular,
                    unidades.dni_titular,
                    unidades.cp_titular,
                    unidades.dir_titular,
                    unidades.cel_titular,
                    unidades.email_titular,
                    unidades.licencia_titular,
                    unidades.nombre_chofer,
                    unidades.dni_chofer,
                    unidades.dir_chofer,
                    unidades.cp_chofer,
                    unidades.cel_chofer,
                    unidades.email_chofer,
                    unidades.nombre_chofer_2,
                    unidades.dni_chofer_2,
                    unidades.dir_chofer_2,
                    unidades.cp_chofer_2,
                    unidades.cel_chofer_2,
                    unidades.email_chofer_2,
                    unidades.marca_unidad,
                    unidades.modelo_unidad,
                    unidades.dominio_unidad,
                    unidades.year_unidad,
                    unidades.categoria_unidad,
                    unidades.abono_unidad,
                    caja_cont.movil_caja,
                    caja_cont.deber,
                    caja_cont.haber,
                    caja_cont.saldo,
                    abonos.movil_abono,
                    abonos.descripcion,
                    abonos.abono
                    FROM
                    unidades
                    LEFT JOIN caja_cont ON caja_cont.movil_caja = unidades.movil
                    LEFT JOIN abonos ON abonos.movil_abono = unidades.movil
                    WHERE movil = $movil ORDER BY id DESC LIMIT 1 ;
                    ")->fetchAll(PDO::FETCH_OBJ);

    foreach ($registros as $unidades) :
        echo "<br>";
    ?>
        <form action="calcula_pago.php" method="POST">Pago

            <input type="text" id="pago" name="pago" required autofocus>
            <input type="hidden" id="movil" name="movil" value="<?php echo $movil ?> ">
            <button class="boton">Guardar</button>
        </form>

        <br>

        <br>

        <form>

            <fieldset>

                <th>
                <td>Datos unidad: <?php echo $movil ?></td>
                <br>
                <td class="vista"> Tipo: <?php echo $unidades->tropa ?></td>
                <br>
                <td>Descripción: <strong><?php echo $unidades->categoria_unidad ?></strong></td>
                <br>
                <td> Abono Semanal: <strong><?php echo $unidades->descripcion ?></strong></td>
                </th>
                <br>

                <?php

                $fechaActual = date('d-m-Y');
                $fechaSegundos = strtotime($fechaActual);

                $semana = date('W', $fechaSegundos);

                echo "Semana: " . $semana;

                $deuda_ant = $base->query("SELECT movil_caja, deber, haber, saldo FROM caja_cont WHERE movil_caja = $movil ORDER BY id DESC LIMIT 1 ;
                        ")->fetchAll(PDO::FETCH_OBJ);



                foreach ($deuda_ant as $plata_ant) :

                    $debe = $plata_ant->deber;
                    $haber = $plata_ant->haber;

                    $saldo = $plata_ant->saldo;
                //$debe_plata = $debe - $haber;

                endforeach;


                ?>
                <br>
                <br>
                <a href="inicio.php" class="boton">Volver</a>
            </fieldset>
        </form>
        <br>

        <?php
        //header("Location=../voucher/carga.php?movil");
        ?>
        
        <form action="../voucher/carga.php" method="post" name="movil">
            <input type="hidden" value="<?php echo $movil ?>" name="movil">Cargar Voucher
            <input type="submit">
        </form>
                   <table>

            <br>
            <tr><strong><?php echo $unidades->tropa ?></strong> </tr>
            <tr>
                <th>Datos Titular</th>
                <th>Datos Chofer TD</th>
                <th>Datos Chofer TN</th>
                <th>Datos Unidad</th>
            </tr>
            <tr>
                <td>Nombre: <?php echo $unidades->nombre_titular ?></td>
                <td>Nombre: <?php echo $unidades->nombre_chofer ?></td>
                <td>Nombre: <?php echo $unidades->nombre_chofer_2 ?></td>
                <td>Marca: <?php echo $unidades->marca_unidad ?> </td>
            </tr>
            <tr>
                <td>DNI: <?php echo $unidades->dni_titular ?></td>
                <td>DNI: <?php echo $unidades->dni_chofer ?></td>
                <td>DNI: <?php echo $unidades->dni_chofer_2 ?> </td>
                <td>Marca <?php echo $unidades->modelo_unidad ?></td>
            </tr>
            <tr>
                <td>Fecha de inscripción: <?php $fecha = $unidades->fecha_ini;
                                            $fecha_nueva = new DateTime($fecha);
                                            echo $fecha_nueva->format("d F Y") ?></td>


                <td>Direccion: <?php echo $unidades->dir_chofer ?></td>
                <td>Direccion: <?php echo $unidades->dir_chofer_2 ?></td>
                <td>Dominio: <?php echo $unidades->dominio_unidad ?></td>
            </tr>
            <tr>
                <td>CP: <?php echo $unidades->cp_titular ?></td>
                <td>CP: <?php echo $unidades->cp_chofer ?></td>
                <td>CP: <?php echo $unidades->cp_chofer_2 ?></td>
                <td>Año: <?php echo $unidades->year_unidad ?></td>
            </tr>
            <tr>
                <td>Cel: <?php echo $unidades->cel_titular ?></td>
                <td>Cel: <?php echo $unidades->cel_chofer ?></td>
                <td>Cel: <?php echo $unidades->cel_chofer_2 ?></td>
                <td>Categoria Unidad: <?php echo $unidades->categoria_unidad ?></td>
            </tr>
            <tr>
                <td>email: <?php echo $unidades->email_titular ?></td>
                <td>email: <?php echo $unidades->email_chofer ?></td>
                <td>email: <?php echo $unidades->email_chofer_2 ?></td>
                <td>Licencia: <?php echo $unidades->licencia_titular ?></td>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Abono Unidad: <?php echo $unidades->abono_unidad ?></td>


        </table>

    <?php
    endforeach
    ?>
    <br>
    <a href="../index.php" class="boton">Salir</a>
</body>

</html>