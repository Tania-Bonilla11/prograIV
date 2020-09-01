<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $level = $_POST['slct'];
      if($level==='1') {
         header('location:principiante.php'); 
      }else if($level==='2') {
         header('location:niveles/nivel2.html'); 
      }else if($level==='3'){
         header('location:niveles/nivel3.html'); 

      }
    }
    require 'welcomexd.php';
