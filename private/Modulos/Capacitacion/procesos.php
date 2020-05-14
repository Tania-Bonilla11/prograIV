<?php 
include('../../Config/Config.php');
$capacitacion = new capacitacion($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$capacitacion->$proceso( $_GET['capacitacion'] );
print_r(json_encode($capacitacion->respuesta));

class capacitacion{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($capacitacion){
        $this->datos = json_decode($capacitacion, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el tema de la  capacitacion';
        }
        if( empty(trim($this->datos['tiempo'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el tiempo de la  capacitacion';
        }
        
        $this->almacenar_capacitacion();
    }
    private function almacenar_capacitacion(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO capacitacion (nombre,tiempo) VALUES(
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['tiempo'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro capacitacion insertado correctamente';
            }else if($this->datos['accion']==='modificar'){
                $this->db->consultas('
                UPDATE capacitacion SET
                     nombre       = "'. $this->datos['nombre'] .'",
                     tiempo       = "'. $this->datos['tiempo'] .'"
                 WHERE idCapacitacion = "'. $this->datos['idCapacitacion'] .'"
             ');
             $this->respuesta['msg'] = 'Registro actualizado correctamente';
            

            }
        }
    }
    public function buscarCapacitacion($valor=''){
        $this->db->consultas('
            select capacitacion.idCapacitacion, capacitacion.nombre, capacitacion.tiempo
            from capacitacion
            where capacitacion.nombre like "%'.$valor.'%" or capacitacion.tiempo like "%'.$valor.'%" 
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }
    public function eliminarCapacitacion($idCapacitacion=''){
    
            $this->db->consultas( '
                delete capacitacion
                from capacitacion
                where capacitacion.idCapacitacion = "'.$idCapacitacion.'"
            ');
           
                $this->respuesta['msg'] = 'Registro eliminado correctamente';
      
    }
 
}
?>