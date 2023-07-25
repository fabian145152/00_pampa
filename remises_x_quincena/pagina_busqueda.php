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
    <?php
    include "database.php";
    ?>
</body>

</html>