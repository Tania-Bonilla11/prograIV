
<?php 
include('../../Config/Config.php');
$usuario = new usuario($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$usuario->$proceso( $_GET['usuario'] );
print_r(json_encode($usuario->respuesta));

class usuario{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($usuario){
        $this->datos = json_decode($usuario, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el nombre';
        }
        if( empty(trim($this->datos['email'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el apellido';
        }
        if( empty(trim($this->datos['pass'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la contraseña';
        }
        $this->almacenar_usuario();
    }
    private function almacenar_usuario(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO usuario (nombre,email,pass) VALUES(
                     
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['email'] .'",
                        "'. $this->datos['pass'] .'"
                   
                    )
                ');
                $this->respuesta['msg'] = 'Te haz registrado correctamente';
            } 
        }
    }
   
}
?>