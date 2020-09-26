<?php session_start();

if(isset($_SESSION['usuario'])) {
    //Mostrando vistas segun el provilegio
    header('location:acciones.php');
}else{
    
    header('location: ../../../../../private/LogReg/login.php');

}
  
        
?>