<?php session_start();

if(isset($_SESSION['usuario'])) {
    //Mostrando vistas segun el provilegio
    header('location:/../../../../miguiavial/prograiv/public/Videos/menu.html');
}else{
    
    header('location: ../../../private/LogReg/login.php');

}
  
        
?>