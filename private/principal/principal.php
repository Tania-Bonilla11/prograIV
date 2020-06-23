<?php session_start();
/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file principal.php-> principal
 */
//direcionando a pagina principal de usuario sin privilegio
if(isset($_SESSION['usuario'])) {
    header('location: ../../../PROGRAIV/public/Usuariop/usuarionormal.html');    
}else{
    header('location: login.php');
}
  
        
?>