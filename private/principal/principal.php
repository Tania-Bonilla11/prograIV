<?php session_start();

if(isset($_SESSION['usuario'])) {
    header('location: ../../../PROGRAIV/public/Usuariop/usuarionormal.html');    
}else{
    header('location: login.php');
}
  
        
?>