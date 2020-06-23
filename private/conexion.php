<?php
/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file conexion.php-> Conexion a la base datos eduvial
 */
    
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>