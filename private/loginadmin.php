<?php session_start();
/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file loginadmin/capacitador.php->Login admin/capacitador 
 */

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //se obtienen los datos de los input de login de usuarios con privilegios
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clavexd = $_POST['clave'];
        $privilegio=$_POST['privilegio'];
        //validacion de campos vacios
        if (empty($usuario)){
            $error .= '<i> Debe ingresar su usuario</i>';
        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= '<i>Debe ingresar la clave</i>';
        }else{   //mostrar mensaje de error si la conexion a bd no ocurre
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=db_eduvial', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        //consulta que llama los usuarios del login los cuales posean privilegio
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave AND privilegio=:privilegio'
        );
        //atribucion de valores de bd a  las variables
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave,
            ':privilegio' => $privilegio
        ));
        //regresar los valores en forma de fila
            
        $resultado = $statement->fetch();
    
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['privilegio'] = $privilegio;
            //condicion que si cumple nivel de admin direccione a pagina principal admin
            if(isset($_SESSION['usuario'])and $privilegio=='1'){
                header('location: ../../PROGRAIV/public/Usuariop/usuariop.html');
                  //condicion que si cumple nivel de capacitador direccione a pagina principal capacitador
            }elseif(isset($_SESSION['usuario'])and $privilegio=='2'){
                header('location: ../../PROGRAIV/public/Usuariop/usuariocapa.html');
            }else{
                header('location: principal/principal.php');
            }//al no encontrar usuario con esas condiciones avisar que dicho usuario no existe
        }else{
            $error .= '<i>Este usuario con privilegios no existe</i>';
        }
    }
}//archivo que vera el cliente
require '../public/frontend/loginadmin-vista.php';


?>