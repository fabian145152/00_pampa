<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

  <h1>ACTUALIZAR</h1>
  <?php
  //------------------------------------------------------------------------
  //Hago esta linea para conectarme y guardad los datos actualizados
  include("coneccion.php");
  //------------------------------------------------------------------------

  /*
  Ahora tengo que hacer un if para que me lea los $_GET cuando trae info de la otra pagina y no le el $_POST que uso para hacer el update
  */

  if (!isset($_POST["bot_actualizar"])) {
    $id = $_GET["id"];
    $patente = $_GET["pat"];
    $movil = $_GET["mov"];
    $equipo = $_GET["equi"];
    $serie = $_GET["seri"];
    $estado = $_GET["esta"];
    $licencia = $_GET["lice"];
    $titular = $_GET["titu"];
  } else {
    $id = $_POST["id"];
    $patente = $_POST["pat"];
    $movil = $_POST["mov"];
    $equipo = $_POST["equi"];
    $serie = $_POST["seri"];
    $estado = $_POST['esta'];
    $licencia = $_POST["lice"];
    $titular = $_POST['titu'];



    $sql = "UPDATE unidades SET patente=:miPat, 
                                movil=:miMov, 
                                serie=:miSeri, 
                                estado=:miEsta, 
                                licencia=:miLice, 
                                titular=:miTitu 
                                WHERE id=:miId";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(
      ":miId" => $id,
      ":miPat" => $patente,
      ":miMov" => $movil,
      ":miSeri" => $serie,
      ":miEsta" => $estado,
      ":miLice" => $licencia,
      ":miTitu" => $titular
    ));

    header("location:index.php");
  }
  ?>

  <p>

  </p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--
  Para usar la linea anterior me conecte a la BBDD, y use el metodo post porque si uso el get viajan en la url y se me sobreescribirian
  con PHP_SELF Mando todo a esta misma pagina

-->

    <table width="35%" border="0" align="center">
      <tr>
        <td></td>
        <td><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <!-- Si quiero no mostrar el id saco la etiqueta de php y listo -->
        </td>
      </tr>
      <tr>
        <td>Patente</td>
        <td><label for="pat"></label>
          <input type="text" name="pat" id="pat" value="<?php echo $patente ?>">
        </td>
      </tr>
      <tr>
        <td>Movil</td>
        <td><label for="mov"></label>
          <input type="text" name="mov" id="mov" value="<?php echo $movil ?>">
        </td>
      </tr>
      <tr>
        <td>Equipo</td>
        <td><label for="equi"></label>
          <input type="text" name="equi" id="equi" value="<?php echo $equipo ?>">
        </td>
      </tr>
      <tr>
        <td>Serie</td>
        <td><label for="seri"></label>
          <input type="text" name="seri" id="seri" value="<?php echo $serie ?>">
        </td>
      </tr>

      <tr>
        <td>Estado</td>
        <td><label for="esta"></label>
          <input type="text" name="esta" id="esta" value="<?php echo $estado ?>">
        </td>
      </tr>
      <tr>
        <td>Licencia</td>
        <td><label for="lice"></label>
          <input type="text" name="lice" id="lice" value="<?php echo $licencia ?>">
        </td>
      </tr>
      <tr>
        <td>Titular</td>
        <td><label for="titu"></label>
          <input type="text" name="titu" id="titu" value="<?php echo $titular ?>">
        </td>
      </tr>


      <tr>
        <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>