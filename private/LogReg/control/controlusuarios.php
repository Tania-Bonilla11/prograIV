<?php session_start();

if(isset($_SESSION['usuario'])) {
    //Mostrando vistas segun el provilegio
    if ($_SESSION['privilegio'] == 1) {
        header('location: ../../../public/Registros/RegistrosA.html');
    }else if($_SESSION['privilegio'] == 2){
        header('location: ../../../public/Registros/RegistrosB.html');
    }
}
  
        
?>