<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro Eduvial</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../public/css/estilo.css">
    
</head>
<body  class="bg-secondary">
<div class="container-form">

        <div class="header" >
        <a href="../../../prograIV/index.html"><button onclick="location.href='../../index.html'"type="button" id="btn-close-comenzar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            <div class="logo-title">
                <img src="../../img/fondo.png" alt="">
                
            </div>
            <div class="menu">
                <a href="../private/login.php"><li class="module-login active" >Iniciar Sesion</li></a>
                <a href="../private/register.php"><li class="module-register" >Registrarse</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido </h1><h4>ingresa tus datos</h4></div>
            <br>
               
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" autofocus name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <div class="privilegio line-input">
           
                <label >¿No eres estudiante?</label><br>
                <label >ingresar como:</label><br>
              <div class="col-8">
                    <select name="privilegio">
                      <option value="">--Seleccionar--</option>
                      <option value="1">Admin</option>
                      <option value="2">Capacitador</option>
                        
                    </select> 
                </div>
                
                
           
               
            </div>
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            <br>
            <br>
            
            <button type="submit">Iniciar sesion<label class="lnr lnr-chevron-right"></label></button>
            <a href="../private/loginadmin.php">Iniciar Sesion como Admin</a>
            <a href="../private/recuperar.php">Olvide Contraseña</a>
        </form>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/login.js"></script>
</body>
</html>