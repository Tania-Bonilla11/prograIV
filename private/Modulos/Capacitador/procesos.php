<?php 
include('../../Config/Config.php');
$capacitador = new capacitador($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$capacitador->$proceso( $_GET['capacitador'] );
print_r(json_encode($capacitador->respuesta));

class capacitador{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($capacitador){
        $this->datos = json_decode($capacitador, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre del capacitador';
        }
        if( empty(trim($this->datos['apellido'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el apellido del capacitador';
        }
        if( empty(trim($this->datos['direccion'])) ){
            $this->respuesta['msg'] = 'por favor ingrese la direccion del capacitador';
        }
        if( empty(trim($this->datos['correo'])) ){
            $this->respuesta['msg'] = ' favor ingrese el correo del capacitador';
        }
        if( empty(trim($this->datos['clave'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el correo del capacitador';
        }
      
        $this->almacenar_capacitador();
    }
    private function almacenar_capacitador(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO login (nombre,apellido,direccion,correo,clave,privilegio,genero,telefono) VALUES(
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['apellido'] .'",
                        "'. $this->datos['direccion'] .'",
                        "'. $this->datos['correo'] .'",
                        "'. $this->datos['clave'] .'",
                        "'. $this->datos['genero'] .'",
                        "2",
                        "'. $this->datos['telefono'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro Capacitador insertado correctamente';
            }else if($this->datos['accion']==='modificar'){
                $this->db->consultas('
                UPDATE login SET
                     nombre       = "'. $this->datos['nombre'] .'",
                     apellido     = "'. $this->datos['apellido'] .'",
                     direccion    = "'. $this->datos['direccion'] .'",
                     correo       = "'. $this->datos['correo'] .'",
                     clave        = "'. $this->datos['clave'] .'",
                     genero       = "'. $this->datos['genero'] .'",
                     telefono       = "'. $this->datos['telefono'] .'"
                 WHERE id = "'. $this->datos['idCapacitador'] .'"
             ');
             $this->respuesta['msg'] = 'Registro actualizado correctamente';
            

            }
        }
    }
    public function buscarCapacitador($valor=''){
        $this->db->consultas('
            select login.id, login.nombre, login.apellido, login.direccion, login.correo,login.genero
            from login
            where login.privilegio=2 and capacitador.nombre like "%'.$valor.'%" or capacitador.apellido like "%'.$valor.'%" or capacitador.direccion like "%'.$valor.'%"
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }
    public function eliminarCapacitador($idCpacitador=''){
    
            $this->db->consultas( '
                delete capacitador
                from login
                where login.id = "'.$idCapacitador.'"
            ');
           
                $this->respuesta['msg'] = 'Registro eliminado correctamente';
      
    }
 
}
?>