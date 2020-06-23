<?php session_start();

/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file cerrar.php-> Cerrar sesion
 */
//destuir sesion 
    session_destroy();
    $_SESSION = array();
//direccionar a pagina de presentacion de la WebApp
    header('location: ../index.html');

?>