<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuentra Parejas</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/estilojuego.css">
 
</head>
<body>
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
                  </li><i class="fa fa-map-signs fa-2x" aria-hidden="true"></i> Te encuentras en: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUEGO DE PAREJAS
                 </li>
               

                <li class="nav-item"> 
                    <a href="../../../private/LogReg/control/control.php">&nbsp;&nbsp;menu de juegos</a>
                 </li><i class="fa fa-gamepad fa-2x" aria-hidden="true"></i>
                 
                 </li>
              </ul>
           </div>
         
        </div>
        
     </div>
</n> </n>
   <form id="contpair" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  
     <img class="foto1" src="../../../img/forito.png" alt="imagen 1"> 
      <details >
         <summary>  <img style="align:right"src="../../../img/arrr.png">¿Cómo Jugar? </summary>

         <p>Existe un número par de tarjetas con imagenes de señales de tránsito,
         deberás dar clic sobre una y luego buscar la tarjeta con la misma señal de tránsito.
         
         Al terminar tu partida puedes observar el récord de los jugadores,¿será que puedes puedes superarlos?.
        
        </p>
        
         
      </details>
    
      <div style=" 
      color:  #ffffff;
      margin-right: 50%;
      margin-left:20%; 
      width: 100%;
       font-size:large; 
       font-family:cursive; "> 
       <br>
   
      
    <h3 ><img style="align:right" src="../../../img/level.png"> Selecciona un nivel para jugar</h3>
                  <br>
                  <div class="select">
                     <select require id="slct" name="slct"> 
                     
                       <option value="0">ELIGE UN NIVEL</option>
                       <option value="1">Principiante </option>
                       <option value="2">Fanatico</option>
                        <option value="3">Leyenda</option>
                         
</select> 
     </div>
                 
    </div><BR><button type="submit"name="submit"type="button" style="background: #f37121; color:white;"class="btn  btn-lg btn-block">C O M E N Z A R</button>
      

    &nbsp;&nbsp;&nbsp;&nbsp;          

      </div> 



     
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>

</html>
