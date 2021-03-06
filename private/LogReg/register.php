<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        
        if (empty($correo)){
            $error .= '<i>Favor de ingresar el correo</i>';
        } 
        else if (strlen($correo) > 30) {
                $error .= '<i>El Correo Es Demasiado Largo</i>'; 
            }
            else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $error .= '<i>El Correo es incorrecto</i>'; 
            }
        
        else if (empty($usuario)){
            $error .= '<i>Favor ingresar el usuario</i>';
        }
        else if (strlen($usuario) > 20) {
            $error .= '<i>El Usuario Es Demasiado Largo</i>'; 
        }
        else if (strlen($usuario) < 4) {
            $error .= '<i>El Usuario Es Demasiado Corto</i>'; 
        }
        else if (empty($_POST['clave'])){
            $error .= '<i>Favor ingresar la contraseña</i>';
        }
        else if (strlen($_POST['clave']) < 8) {
            $error .= '<i>la contraseña Es Demasiada Corta</i>'; 
        } 
        else if (strlen($_POST['clave']) > 16) {
            $error .= '<i>la contraseña Es Demasiada larga</i>'; 
        }
        else if (empty($_POST['clave2'])){
            $error .= '<i>Favor ingresar la contraseña de confirmación</i>';
        
        }else{
            // Cambio en la conexion a la base de datos a Conexion/DB.php
            include_once('../../Database/Conexion/DB.php');
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
                     
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (correo, usuario, clave, privilegio) VALUES (:correo, :usuario, :clave, 0)');

            $statement->execute(array(
                ':correo' => $correo,
                ':usuario' => $usuario,
                ':clave' => $clave
            ));

            $arr = $statement->errorInfo();
            
            if (!empty($arr) && $arr[1] == 1) {
                $error .= $arr[2];
            }
            else {
                $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
            }
        }
    }


    require '../../public/LogReg/register-vista.php';

?>