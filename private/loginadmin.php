<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
       /* $clave = hash('sha512', $clave);*/
        $privilegio=$_POST['privilegio'];
        
        if (empty($usuario)){
            $error .= '<i> ingrese el usuario</i>';
        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= '<i>ingrese la clave</i>';
        }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave AND privilegio=:privilegio'
        );
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave,
            ':privilegio' => $privilegio
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['privilegio'] = $privilegio;
            if(isset($_SESSION['usuario'])and $privilegio=='1'){
                header('location: ../../PROGRAIV/public/Usuariop/usuariop.html');
            }elseif(isset($_SESSION['usuario'])and $privilegio=='2'){
                header('location: ../../PROGRAIV/public/Usuariop/usuariop.html');
            }else{
                header('location: principal/principal.php');
            }
        }else{
            $error .= '<i>Este usuario con privilegios no existe</i>';
        }
    }
}
require '../public/frontend/loginadmin-vista.php';


?>