<?php
require 'conexion.php';
$id=$_POST[''];
$nombre=$_POST['nombre'];
$email =$_POST['email'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
$error = '';
$insertar="insert into usuario values('','$nombre','$email','$pass')";
$query= mysqli_query($conexion,$insertar);

 if (empty($nombre)){
    $error .= '<i>Favor ingresar el nombre</i>';
}
else if (strlen($nombre) > 20) {
    $error .= '<i>El nombre Es Demasiado Largo</i>'; 
}
else if (strlen($nombre) < 4) {
    $error .= '<i>El nombre Es Demasiado Corto</i>'; 
}

else if (empty($email)){
    $error .= '<i>Favor de ingresar el correo</i>';
} 
else if (strlen($email) > 30) {
        $error .= '<i>El Correo Es Demasiado Largo</i>'; 
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= '<i>El Correo es incorrecto</i>'; 
    }


else if (empty($pass)){
    $error .= '<i>Favor ingresar la contraseña</i>';
}
else if (strlen($pass) < 6) {
    $error .= '<i>la  Correo Es Demasiado Corta</i>'; 
}
else if (empty($pass2)){
    $error .= '<i>Favor ingresar la contraseña de confirmacion</i>';

}else if($query){
    /* echo '<script type="text/javascript">',
         'checkInputs();',
         '</script>';*/
        echo '<script>
       location.href="usuarionormal.html";</script>
        ';
 
 
 }









?>