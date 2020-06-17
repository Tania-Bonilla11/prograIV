<?php 
include('../../Config/Config.php');
$admin = new admin($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$admin->$proceso( $_GET['admin'] );
print_r(json_encode($admin->respuesta));

class admin{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($admin){
        $this->datos = json_decode($admin, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre del admin';
        }
        if( empty(trim($this->datos['apellido'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el apellido del admin';
        }
        if( empty(trim($this->datos['correo'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el correo del admin';
        }
        if( empty(trim($this->datos['clave'])) ){
            $this->respuesta['msg'] = 'por favor ingrese la clave del admin';
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
                    INSERT INTO admin (admin,apellido,correo,clave,genero) VALUES(
                        "'. $this->datos['admin'] .'",
                        "'. $this->datos['apellido'] .'",
                        "'. $this->datos['correo'] .'",
                        "'. $this->datos['clave'] .'",
                        "'. $this->datos['genero'] .'"
                      
                    )
                ');
                $this->respuesta['msg'] = ' administrador registrado correctamente';
            }else if($this->datos['accion']==='modificar'){
                $this->db->consultas('
                UPDATE admin SET
                     admin      = "'. $this->datos['admin'] .'",
                     apellido     = "'. $this->datos['apellido'] .'",
                     correo    = "'. $this->datos['correo'] .'",
                     clave       = "'. $this->datos['clave'] .'",
                     genero       = "'. $this->datos['genero'] .'"
                     WHERE idAdmin = "'. $this->datos['idAdmin'] .'"
             ');
             $this->respuesta['msg'] = 'administrador actualizado correctamente';
            

            }
        }
    }
    public function buscarAdmin($valor=''){
        $this->db->consultas('
            select admin.idAdmin, admin.admin, admin.apellido, admin.correo, admin.clave,admin.genero
            from admin
            where admin.admin like "%'.$valor.'%" or admin.apellido like "%'.$valor.'%" or admin.correo like "%'.$valor.'%"
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }
    public function eliminarAdmin($idCpacitador=''){
    
            $this->db->consultas( '
                delete admin
                from admin
                where admin.idAdmin = "'.$idAdmin.'"
            ');
           
                $this->respuesta['msg'] = 'Administrador eliminado correctamente';
      
    }
 
}
?>