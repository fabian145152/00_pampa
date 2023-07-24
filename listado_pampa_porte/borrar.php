<?php

include("coneccion.php");

$id = $_GET["id"];

$base->query("DELETE FROM unidades WHERE id='$id'");

header("location:index.php");
