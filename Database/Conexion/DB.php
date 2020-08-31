<?php
$conexion;

try {
    $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', 'An63l');
}
catch (PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
}
?>