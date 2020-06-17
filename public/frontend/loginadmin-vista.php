<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro Eduvial</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../public/css/estilo.css">
    
</head>
<body  class="bg-secondary">
<div class="container" id="container">
 <div class="form-container sign-up-container">
        <div class="header" >
        <a href="../../../prograIV/index.html"><button onclick="location.href='../../index.html'"type="button" id="btn-close-comenzar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
           
            <div class="menu">
                <a href="../private/login.php"><li class="module-login active" >Inicio</li></a>
         
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
       
        <h4> credenciales</h4>
          
               
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre" autofocus name="admin">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Clave" name="clave">
            </div>
             <div class="white" ><h1>Bienvenido Adminnn</h1><h4>ingresa tus credenciales</h4></div>
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?> 
        
            
            <button type="submit">Iniciar sesion<label class="lnr lnr-chevron-right"></label></button>
            
        </form>
        </div>
        <div class="overlay-panel overlay-right">
       
      
        <a href="../../index.html"><img src="https://img.icons8.com/bubbles/100/000000/admin-settings-male.png"/></a>
				<h1>Hola, Bienvenido!</h1>
				<p>Ingresa tus credenciales y comienza el viaje con nosotros,recuerda no compartas tus datos son personales!</p>
			
			</div>

    </div>
    
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/login.js"></script>
</body>
</html>