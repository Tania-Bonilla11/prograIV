
<?php 
include('../../Config/Config.php');
$lugar = new lugar($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$lugar->$proceso( $_GET['lugar'] );
print_r(json_encode($lugar->respuesta));

class lugar{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($lugar){
        $this->datos = json_decode($lugar, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty(trim($this->datos['direccion'])) ){
            $this->respuesta['msg'] = 'por favor ingrese la direccion del Lugar';
        }
        if( empty(trim($this->datos['solicitante'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el solicitante del Lugar';
        }
        if( empty(trim($this->datos['telefono'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el telefono del lugar ';
        }
        $this->almacenar_lugar();
    }
    private function almacenar_lugar(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO lugar (direccion,solicitante,telefono) VALUES(
                        "'. $this->datos['direccion'] .'",
                        "'. $this->datos['solicitante'] .'",
                        "'. $this->datos['telefono'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                   UPDATE lugar SET
                      
                        direccion    = "'. $this->datos['direccion'] .'",
                        solicitante  = "'. $this->datos['solicitante'] .'",
                        telefono   = "'. $this->datos['telefono'] .'"
                    WHERE idLugar = "'. $this->datos['idLugar'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarLugar($valor=''){
        $this->db->consultas('
                       
            select lugar.idLugar,lugar.direccion, lugar.solicitante, lugar.telefono
            from lugar
            where  lugar.direccion like "%'.$valor.'%" or lugar.solicitante like "%'.$valor.'%"
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }
    public function eliminarLugar($idLugar=''){
        $this->db->consultas('
            delete lugar
            from lugar
            where lugar.idLugar = "'.$idLugar.'"
        ');
        $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>