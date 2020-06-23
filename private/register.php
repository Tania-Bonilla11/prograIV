<?php session_start();

    /**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file register.php->Registro de usuarios 
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //llamar el valor obtenidos de los input y atribuirlos a variables
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);//convertir la contraseña del usuario a otros caracteres por seguiridad
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        //validacion de campos vacios
        if (empty($correo)){
            $error .= '<i>Favor de ingresar el correo</i>';
        } 
        else if (strlen($correo) > 30) {
                $error .= '<i>El Correo Es Demasiado Largo</i>'; 
            }//validacion de correo
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
        else if (strlen($_POST['clave']) > 12) {
            $error .= '<i>la contraseña Es Demasiada larga</i>'; 
        }
        else if (empty($_POST['clave2'])){
            $error .= '<i>Favor ingresar la contraseña de confirmacion</i>';
        
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            //obtener datos de la tabla y verificar si existe
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
        //validar si las contraseñan coinciden
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        //insersion de datos a la tabla de login
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (id, correo, usuario, clave) VALUES (null, :correo, :usuario, :clave)');
            $statement->execute(array(
                
                ':correo' => $correo,
                ':usuario' => $usuario,
                ':clave' => $clave
                
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        }
    }
//archivo a mostrar

    require '../public/frontend/register-vista.php';

?>