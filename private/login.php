<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

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
        }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave'
        );
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: principal/principal.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
}
require '../public/frontend/login-vista.php';


?>