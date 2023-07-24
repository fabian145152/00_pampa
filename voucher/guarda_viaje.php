<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        -->

    <?php
    $reviaje = $_GET['viaje'];
    include("../includes/conexion.php");



    echo "<h1>Guardar Viaje</h1>";
    echo $reviaje;



    // echo "<h3>Viaje numero: </h3>" . $viaje;

    $vaucher = $base->query("SELECT `sheet1`.`Id` as viaje,
                                    `sheet1`.`Móvil`as movil,
                                    `sheet1`.`Origen`as Origen,
                                    `sheet1`.`Dirección Destino`as Destino, 
                                    `sheet1`.`Nombre Pasajero` as Nombre,
                                    `sheet1`.`Cuenta corriente`as cuenta,
                                    `sheet1`.`Fecha completado`as completado,
                                    `sheet1`.`Reloj`as reloj,
                                    `sheet1`.`Peaje`as peaje,
                                    `sheet1`.`Equipaje`as equipaje,
                                    `sheet1`.`Adicional`as adicional,
                                    `sheet1`.`Plus`as plus,
                                    `sheet1`.`Monto total`as monto
                                    FROM `sheet1`
                                    WHERE id = $reviaje ")->fetchAll(PDO::FETCH_OBJ);

    foreach ($vaucher as $vau) :
    ?>
        <td><?php echo $vau_via = $vau->viaje ?></td>
        <td><?php echo $vau_mov = $vau->movil ?></td>
        <td><?php echo $vau_ori = $vau->Origen ?></td>
        <td><?php echo $vau_des = $vau->Destino ?></td>
        <td><?php echo $vau_nom = $vau->Nombre ?></td>
        <td><?php echo $vau_cue = $vau->cuenta ?></td>
        <td><?php echo $vau_comp = $vau->completado ?></td>
        <td><?php echo $vau_rel = $vau->reloj ?></td>
        <td><?php echo $vau_pea = $vau->peaje ?></td>
        <td><?php echo $vau_equi = $vau->equipaje ?></td>
        <td><?php echo $vau_adi = $vau->adicional ?></td>
        <td><?php echo $vau_plus = $vau->plus ?></td>
        <td><?php echo $vau_monto = $vau->monto ?></td>

    <?php
    endforeach;

    $guarda_vau = "INSERT INTO `vaucher_guardado`(`viaje`, 
                                                `movil`, 
                                                `Origen`,
                                                `Destino`, 
                                                `Nombre`,
                                                `cuenta`,                                                
                                                `completado`, 
                                                `reloj`, 
                                                `peaje`, 
                                                `equipaje`, 
                                                `adicional`, 
                                                `plus`, 
                                                `monto`) 
                                            VALUES (:mi_vau_via,
                                                    :mi_vau_mov,
                                                    :mi_vau_ori,
                                                    :mi_vau_des,
                                                    :mi_vau_nom,
                                                    :mi_vau_cue,                                                                                                  
                                                    :mi_vau_comp,
                                                    :mi_vau_rel,
                                                    :mi_vau_pea,
                                                    :mi_vau_equi,
                                                    :mi_vau_adi,
                                                    :mi_vau_plus,
                                                    :mi_vau_monto)";

    $nuevo_guardado = $base->prepare($guarda_vau);

    $nuevo_guardado->execute(array(
        ":mi_vau_via" => $vau_via,
        ":mi_vau_mov" => $vau_mov,
        ":mi_vau_ori" => $vau_ori,
        ":mi_vau_des" => $vau_des,
        ":mi_vau_nom" => $vau_nom,
        ":mi_vau_cue" => $vau_cue,
        ":mi_vau_comp" => $vau_comp,
        ":mi_vau_rel" => $vau_rel,
        ":mi_vau_pea" => $vau_pea,
        ":mi_vau_equi" => $vau_equi,
        ":mi_vau_adi" => $vau_adi,
        ":mi_vau_plus" => $vau_plus,
        ":mi_vau_monto" => $vau_monto
    ));



    
    echo "<br>";
    echo $viaje = $vau_via;
    echo "<br>";
    echo $movil = $vau_mov;
    echo "<br>";
    
    //La linea de abajo esta lista 
    //                     $base->query("DELETE FROM sheet1 WHERE id = $viaje ");

    //header("Location:../caja/listado.php?q=$movil & v=$viaje ");
    header("Location:../voucher/carga.php?q=$movil & v=$viaje ");
    ?>










</body>

</html>