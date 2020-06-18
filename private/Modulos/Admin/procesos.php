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
            $this->respuesta['msg'] = 'por favor ingrese el nombre del admin';
        }
        if( empty(trim($this->datos['apellido'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el apellido del admin';
        }
        if( empty(trim($this->datos['usuario'])) ){
            $this->respuesta['msg'] = 'por favor ingrese usuario de cuenta para nuevo  admin';
        }
        if( empty(trim($this->datos['correo'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el correo del admin';
        }
        if( empty(trim($this->datos['clave'])) ){
            $this->respuesta['msg'] = 'por favor ingrese la clave del admin';
        }
        if( empty(trim($this->datos['direccion'])) ){
            $this->respuesta['msg'] = 'por favor ingrese direccion del admin';
        }
        if( empty(trim($this->datos['telefono'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el telefono del admin';
        }
        if( empty(trim($this->datos['genero'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el genero del admin';
        }
      
        $this->almacenar_admin();
    }
    private function almacenar_admin(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO login (correo,usuario,clave,privilegio,nombre,apellido,direccion,telefono,genero) VALUES(
                        "'. $this->datos['correo'] .'",
                        "'. $this->datos['usuario'] .'",
                        "'. $this->datos['clave'] .'",
                        1,
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['apellido'] .'",
                        "'. $this->datos['direccion'] .'",
                        "'. $this->datos['telefono'] .'",
                        "'. $this->datos['genero'] .'"
                      
                    )
                ');
                $this->respuesta['msg'] = ' administrador registrado correctamente';
            }else if($this->datos['accion']==='modificar'){
                $this->db->consultas('
                UPDATE login SET
                     correo         = "'. $this->datos['correo'] .'",
                     usuario        = "'. $this->datos['usuario'] .'",
                     clave          = "'. $this->datos['correo'] .'",
                     privilegio     = 1,
                     nombre         = "'. $this->datos['nombre'] .'",
                     apellido       = "'. $this->datos['apellido'] .'",
                     direccion      = "'. $this->datos['direccion'] .'",
                     telefono       = "'. $this->datos['telefono'] .'",
                     genero         = "'. $this->datos['genero'] .'",
                     WHERE id       = "'. $this->datos['id'] .'"
             ');
             $this->respuesta['msg'] = 'administrador actualizado correctamente';
            

            }
        }
    }
    public function buscarAdmin($valor=''){
        $this->db->consultas('
        select * from login where  or 
           login.nombre like "%'.$valor.'%" or login.usuario like "%'.$valor.'%" or login.direccion like "%'.$valor.'% "
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }
    public function eliminarAdmin($id=''){
    
            $this->db->consultas( '
                delete usuario
                from login
                where login.id = "'.$id.'"
            ');
           
                $this->respuesta['msg'] = 'Administrador eliminado correctamente';
      
    }
 
}
?>