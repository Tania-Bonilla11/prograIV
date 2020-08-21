<?php 
include('../../../Database/Config/Config.php');
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
    //recibir datos del array de admin.html
    public function recibirDatos($admin){
        $this->datos = json_decode($admin, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        //validacion de campos para que no esten vacios
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
        if( empty(trim($this->datos['usuario'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el usuario del admin';
        }
        if( empty(trim($this->datos['direccion'])) ){
            $this->respuesta['msg'] = 'por favor ingrese la direccion del admin';
        }
        if( empty(trim($this->datos['telefono'])) ){
            $this->respuesta['msg'] = 'por favor ingrese el telefono del admin';
        }
      
        $this->almacenar_admin();
    }
    private function almacenar_admin(){
        //insertar datos en login la informacion obtenidos de las cajas de texto
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO login (correo,usuario,clave,privilegio,nombre,apellido,direccion,telefono,genero) VALUES(
                        "'. $this->datos['correo'] .'",
                        "'. $this->datos['usuario'] .'",
                        "'. $this->datos['clave'] .'",
                        "'. $this->datos['privilegio'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['apellido'] .'",
                        "'. $this->datos['direccion'] .'",
                        "'. $this->datos['telefono'] .'",
                        "'. $this->datos['genero'] .'"
                      
                    )
                ');
              //mensaje de resultado de la peticion 
                $this->respuesta['msg'] = ' administrador registrado correctamente';
            }else if($this->datos['accion']==='modificar'){
                //actualizar datos de login 
                $this->db->consultas('
                UPDATE login SET
                     correo         = "'. $this->datos['correo'] .'",
                     usuario        = "'. $this->datos['usuario'] .'",
                     clave          = "'. $this->datos['clave'] .'",
                     privilegio     = "'. $this->datos['privilegio'] .'",
                     privilegio     = "'. $this->datos['privilegio'] .'",
                     nombre         = "'. $this->datos['nombre'] .'",
                     apellido       = "'. $this->datos['apellido'] .'",
                     direccion      = "'. $this->datos['direccion'] .'",
                     telefono       = "'. $this->datos['telefono'] .'",
                     genero         = "'. $this->datos['genero'] .'",
                     WHERE id = "'. $this->datos['idAdmin'] .'"
             ');
             $this->respuesta['msg'] = 'administrador actualizado correctamente';
            

            }
        }
    }
    public function buscarAdmin($valor=''){
        //consulta que llama datos de login que cimplan con especificacion de busqueda
        $this->db->consultas('
            select login.id, login.nombre, login.apellido, login.correo, login.clave,login.genero
            from login
            where login.privilegio=1 and login.nombre like "%'.$valor.'%" or login.apellido like "%'.$valor.'%" or login.correo like "%'.$valor.'%"
        ');
        return $this->respuesta = $this->db->obtener_datos();
    }

    public function buscar($valor=''){

    }
    public function eliminarAdmin($idAdmin=''){
    //consulta que elimina admin del login 
            $this->db->consultas( '
                delete admin
                from login
                where admin.id = "'.$idAdmin.'"
            ');
           
                $this->respuesta['msg'] = 'Administrador eliminado correctamente';
      
    }
 
}
?>