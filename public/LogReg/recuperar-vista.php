<html lang="en">
<head>
<title>Olvide Contraseña</title>
  <style></style>
  <link rel="stylesheet" href="../public/css/recuperar.css">
</head>
<body>
  <div class="container-center">
    <center>
    <img src = "https://cdn3.iconfinder.com/data/icons/map-navigation-8/512/z2-block-stop-closed-road-512.png" width="30%" >
   
      </center>
  <h2>¡No te preocupes!</h2>
  <form id="recuperarform" role="form" action="<php $_SERVER['PHP_SELF'];|?>" method="POST" autocomplete="off">
    <h4>
      escribe tu correo 
      nosotros<br> nos encargamos del resto
    </h4>
    <formgroup>
      <input type="text" name="email"/>
      <label for="email"><br>Correo</label>
      <span style="font-family: 'Montserrat', sans-serif;">escribe tu correo electronico para enviar un codigo</span>
    </formgroup>
    
  
    <button id="login-btn">Enviar Codigo</button>
  
   
    
  </form>
   
  <p>¿la haz recordado? <a href="../../PrograIV/private/login.php">Inciar sesion</a></p>
</div>
</body>
</html>
