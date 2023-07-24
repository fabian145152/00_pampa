<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/detalles.css">
</head>

<body>
  <h1>asdasd</h1>
  <?php
  include('../includes/conexion.php');

  if (!isset($_POST["bot_actualizar"])) {
    $id_abono = $_GET["id_abono"];
    $movil_abono = $_GET["movil_abono"];
    $descripcion = $_GET["descripcion"];
    $abono = $_GET["abono"];
  } else {
    $id_abono = $_POST["id_abono"];
    $movil_abono = $_POST["movil_abono"];
    $descripcion = $_POST["descripcion"];
    $abono = $_POST["abono"];
  }

  $sql = "UPDATE abonos SET movil_abono = :miMovil_abono,
                            descripcion = :miDescripcion,
                            abono = :miAbono 
                            WHERE id_abono = :miId_abono";

  $result = $base->prepare($sql);

  $result->execute(array(
    ":miId_abono" => $id_abono,
    ":miMovil_abono" => $movil_abono,
    ":miDescripcion" => $descripcion,
    ":miAbono" => $abono
  ));

  //header("location:editar.php");

  ?>
  <a href="abono.php" class="boton">Volver</a>
  <br><br>

  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <table width="80%" border="0" align="center">
      <tr>
        <td>
          <label for="id_abono">ID Abono</label>
          <input type="text" name="id_abono" id="id_abono" value="<?php echo $id_abono ?> ">
        </td>
      </tr>
      <tr>
        <td>
          <label for="movil_<bono">Movil Abono</label>
          <input type="text" name="movil_abono" id="movil_abono" value="<?php echo $movil_abono ?> ">
        </td>
      <tr>
        <td>
          <label for="descripcion">Descripcion</label>
          <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion ?> ">
        </td>
      </tr>

      <tr>
        <td>
          <label for="abono">Importe</label>
          <input type="text" name="abono" id="abono" value="<?php echo "$" . $abono . "-" ?> ">
        </td>
      </tr>
    </table>
    <br><br>
    <tr>
      <td><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar" class="boton"></td>
    </tr>
  </form>

</body>

</html>