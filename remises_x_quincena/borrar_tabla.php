<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>HOLA</h1>
    <?php
    include "database.php";
    //include("../includes/conexion.php");
    $con->query("TRUNCATE TABLE caja_remis");

    $con->query("TRUNCATE TABLE voucher_x_movil");

    header("location:inicio_caja.php");



    ?>
</body>

</html>