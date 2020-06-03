<?php session_start();

    if(isset($_SESSION['usuario'])){
        require '../../public/Usuariop/usuariop.html';
    }else{
        header ('location: ../../login.php');
    }
        
?>