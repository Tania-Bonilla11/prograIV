<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registar Rduvial</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../prograIV/public/css/estilo.css">
</head>
<body  class="bg-secondary">
<div class="container-form">
        <div class="header">
        <a href="../../../prograIV/index.html"><button onclick="location.href='../../index.html'"type="button" id="btn-close-comenzar" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            <div class="logo-title">
                
                
            </div>
            <div class="menu">
                <a href="../../private/LogReg/login.php"><li class="module-login">Iniciar Sesion</li></a>
                <a href="../../private/LogReg/register.php"><li class="module-register active">Registrarse</li></a>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Crear Cuenta </h1><h4>Ingresa tus datos</h4></div>

            
               
            
            <div class="user line-input">
                <label class="lnr lnr-envelope"></label>
                <input type="text"  placeholder="Correo" autofocus name="correo" value="<?php if(isset($correo)) echo $correo?>">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario" pattern="[a-zA-Z ]+" value="<?php if(isset($usuario)) echo $usuario?>">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña"  name="clave2">
            </div>
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            <br>
            <br>
            <button type="submit">Registrarse<label class="lnr lnr-chevron-right"></label></button>
    </form>
    </div>
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/login.js"></script>
</body>
</html>