<?php

try {
    $base = new PDO('mysql:host=localhost; dbname=00_pampa_porte', 'root', 'belgrado');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
} catch (Exception $e) {
    die('Error' . $e->getMessage());
    echo "Linea de error: " . $e->getLine();
}
