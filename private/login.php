
<?php session_start();

/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file login.php->Login 
 */

    $error = '';
    //se obtienen los datos de los input del frontend login usuario
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);//funcion hash que convierte la clave en otros caracteres para seguridad
        
        //validacion de campos vacios
        if (empty($usuario)){
            $error .= '<i>Favor de ingresar el usuario</i>';
        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= '<i>Favor de ingresar la clave</i>';
        }else{
        try{
            //mostrar mensaje de error si la conexion a bd no ocurre
            $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        //consulta para llamar a los usuarios 
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave '
        );
        //asignar el valor de datos en la base de datos a las variables de los input
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave,
            
        ));
           //regresar el resultado en forma de filas afectadas 
        $resultado = $statement->fetch();
        //condicion por si exite un usuario con las credenciales llevar a pagina principal
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            if(isset($_SESSION['usuario'])){
                
                header('location: principal/principal.php');
            }//al no existir usuario registrado notificarle al cliente
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
}//archivo que vera el cliente 
require '../public/frontend/login-vista.php';