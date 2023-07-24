<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Segundo</h1>
    <?php
    $movil = $_GET['removil'];
    echo $movil;

    //header("location:../caja/listado.php?q=$movil");

    ?>
    <script>
        location.href = '../caja/listado.php?q=$movil';
    </script>

</body>

</html>