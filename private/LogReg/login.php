<?php session_start();
    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
       
        if (empty($usuario)){
            $error .= '<i>Favor de ingresar el usuario</i>';
        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= '<i>Favor de ingresar la clave</i>';
        }
        else {
            // Cambio en la conexion a la base de datos a Conexion/DB.php
            include_once('../../Database/Conexion/DB.php');
            
            $statement = $conexion->prepare('
            SELECT id, usuario, clave, privilegio FROM login WHERE usuario = :usuario AND clave = :clave '
            );
            
            $statement->execute(array(
                ':usuario' => $usuario,
                ':clave' => $clave,
            ));
                
            $resultado = $statement->fetch(PDO::FETCH_OBJ);
            
            if ($resultado !== false){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['user_id'] = $resultado->id;
                $_SESSION['privilegio'] = $resultado->privilegio;

                if(isset($_SESSION['usuario'])){
                    header('location: ../../private/LogReg/control/principal.php ');
                }
            }else{
                $error .= '<i>Este usuario no existe</i>';
            }
        }
}
require '../../public/LogReg/login-vista.php';