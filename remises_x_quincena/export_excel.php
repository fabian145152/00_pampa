<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "PHPExcel/Classes/PHPExcel.php";
    //require_once 'PHPExcel/PHPExcel\ClassesPHPExcel.php';

    // Crear una instancia del objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    // Establecer propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Nombre del creador")
        ->setLastModifiedBy("Nombre del último modificador")
        ->setTitle("Título del documento")
        ->setSubject("Asunto del documento")
        ->setDescription("Descripción del documento")
        ->setKeywords("palabras clave")
        ->setCategory("Categoría");

    // Conectar a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=apampa", "root", "belgrado");

    // Consulta SQL para obtener los datos de la tabla
    $query = "SELECT * FROM voucher_x_movil ORDER BY movil";
    $statement = $conexion->prepare($query);
    $statement->execute();

    // Obtener los datos de la consulta
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Agregar los datos al archivo Excel
    $objPHPExcel->getActiveSheet()->fromArray($resultados, NULL, 'A1');

    // Establecer el nombre de la hoja activa
    $objPHPExcel->getActiveSheet()->setTitle('Hoja 1');

    // Crear un objeto Writer para guardar el archivo Excel
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    // Guardar el archivo en el sistema de archivos
    $objWriter->save('archivo.xlsx');
    ?>
    <a href="archivo.xlsx">Descargar</a>
</body>

</html>