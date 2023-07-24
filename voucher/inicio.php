<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css">
</head>

<body>
    <h1>Carga de Voucher</h1>
    <ol>
        <li>PHP.net</li>
        <li>traer el archivo excel abrirlo y guardarlo con *.ods</li>
        <li>Contar registros "SELECT * FROM `sheet1` WHERE 1"</li>
        <li>Contarlos antes y despues</li>
        <li>No dejar mas de 1000 Voucher</li>
        <li>sheet1 es la tabla que vamos a usar</li>
        <li>vaciar la tabla completa "TRUNCATE TABLE sheet1"</li>
    </ol>

    <form action="carga.php" method="GET">
        <input type="text" name="movil" id="movil" required autofocus>
        <input type="button" name="movil" id="movil" value="Ingrese Movil" class="boton">
    </form>
    <br>
    <a href="../index.php" class="boton">Salir</a>
</body>

</html>