<?php

include("../includes/conexion.php");

$id = $_GET["id_abono"];

$base->query("DELETE FROM abonos WHERE id_abono='$id'");

header("location:abono.php");
