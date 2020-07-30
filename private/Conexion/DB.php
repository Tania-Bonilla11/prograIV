<?php
$conexion;

try {
    $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', 'progra');
}
catch (PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
}
?>