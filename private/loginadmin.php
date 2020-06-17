<?php session_start();

    if(isset($_SESSION['admin'])) {
        header('location: index.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $admin = $_POST['admin'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        if (empty($admin)){
            $error .= '<i>Favor de ingresar Nombre</i>';
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
        SELECT * FROM admin WHERE admin = :admin AND clave = :clave'
        );
        
        $statement->execute(array(
            ':admin' => $admin,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['admin'] = $admin;
            header('location: principal/principal.php');
        }else{
            $error .= '<i>Este admin no existe</i>';
        }
    }
}
require '../public/frontend/loginadmin-vista.php';


?>