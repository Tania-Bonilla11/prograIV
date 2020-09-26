<?php session_start();

if(isset($_SESSION['usuario'])) {
    //Mostrando vistas segun el provilegio
    header('location: ../../../public/Juegos/menujuegos.html');
}else{
    
    header('location: ../../../private/LogReg/login.php');

}
  
        
?>