<?php
function semanaNueva($pago)
{
    $fechaActual = date('d-m-Y');
    $fechaSegundos = strtotime($fechaActual);

    $semana = date('W', $fechaSegundos);
    //echo "dia:" . $fechaActual;
    echo "<br>";
    echo "Semana: " . $semana;
    echo "<br>";

    $movil = 11;
   

    $hoy = date("Y-m-d H:i:s");

    include("../includes/conexion.php");
    
    $crea_pago = "INSERT INTO caja_cont (movil_caja, fecha, deber)
                    VALUES 
                            (:movil_caja, :fecha, :deber )";

    $crea_nuevo = $base->prepare($crea_pago);

    $crea_nuevo->execute(array(
        ":movil_caja" => $movil,
        ":fecha" => $hoy,
        ":deber" => $pago
    ));
}
