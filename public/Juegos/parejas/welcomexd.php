<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuentra Parejas</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/estilojuego.css">
 
</head>
<body">
    <div class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container"> <img src="../../../img/road.png" alt=""><h2 style="float: left;color:#30475e">Mi Guia Vial El Salvador</h2><a class="navbar-brand"href="#"></a>
           <div c
           lass="logo">

             
           </div>
          
           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          <br>
         
           <div class="links">
              <ul  >
                <li class="nav-item"> 
                    <a href="../menujuegos.html">Historial de Juegos</a>
                 </li><i class="fa fa-history fa-2x" aria-hidden="true"></i>
                 
                 </li>

                <li class="nav-item"> 
                    <a href="../menujuegos.html">menu de juegos</a>
                 </li><i class="fa fa-gamepad fa-2x" aria-hidden="true"></i>
                 
                 </li>

                

                 
              </ul>
           </div>
         
        </div>
        
     </div>
     <img class="foto1" src="../../../img/foritoo.jpeg" alt="imagen 1"> </n> </n>
   <form id="contpair" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
     <h3 >E N C U E N T R A  </h3><h3 >P A R E J A S</h3>
      <details >
         <summary>  <img style="align:right"src="../../../img/arrr.png">¿Como Jugar? </summary>
    
  
         <p>Existe un numero par de tarjetas con imagenes de señales de transito,
         deberas dar clic sobre una y luego buscar la tarjeta con la misma señal de transito
         entre menos te tardes en encontrarlas demostraras tu capacidad de memorización. </p>
        
         
      </details>
    
      <div style=" 
      color:  #ffffff;
      margin-right: 50%;
      margin-left:20%; 
      width: 100%;
       font-size:large; 
       font-family:cursive; "> 
       <br>
   
      
    <h3 ><img style="align:right"src="../../../img/level .png"> Selecciona un nivel para jugar</h3>
                  <br>
                  <div class="select">
                     <select require id="slct" name="slct"> 
                     
                       <option value="0">¿Que nivel eres?</option>
                       <option value="1">Principiante </option>
                       <option value="2">Fanatico</option>
                        <option value="3">Leyenda</option>
                         
</select> 
     </div>
                 
    </div><BR> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"name="submit"type="button" class="btn btn-danger btn-lg btn-block">C O M E N Z A R</button>
      

                     

      </div> 
  
  
    
    
     
   
    



<script type="text/javascript" src="js/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>









</body>

</html>
