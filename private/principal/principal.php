<?php session_start();

if(isset($_SESSION['usuario'])) {
    //Mostrando vistas segun el provilegio
    if ($_SESSION['privilegio'] == 0) {
        header('location: ../../../PROGRAIV/public/Usuariop/usuarionormal.html');
    }
}else{
    header('location: login.php');
}
  
        
?>