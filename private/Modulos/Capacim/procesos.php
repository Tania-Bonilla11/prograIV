<?php
/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file Modulos/Capacim/procesos.php-> Mantenimiento Capacim
 */
include('../../config/config.php');
$capacim = new capacim($conexion);

$proceso = '';
if (isset($_GET['proceso']) && strlen($_GET['proceso']) > 0) {
    $proceso = $_GET['proceso'];
}
$capacim->$proceso($_GET['capacim']);
print_r(json_encode($capacim->respuesta));

class capacim
{
    private $datos = array(), $db;
    public $respuesta = ['msg' => 'correcto'];

    public function __construct($db)
    {
        $this->db = $db;
    }
    //recibir datos del array de admin.html
    public function recibirDatos($capacim)
    {
        $this->datos = json_decode($capacim, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        //validacion de campos para que no esten vacios
        if (empty(trim($this->datos['capacitador']['id']))) {
            $this->respuesta['msg'] = 'por favor ingrese un capacitador';
        }
        if (empty(trim($this->datos['lugar']['id']))) {
            $this->respuesta['msg'] = 'por favor ingrese un lugar';
        }
        if (empty(trim($this->datos['capacitacion']['id']))) {
            $this->respuesta['msg'] = 'por favor ingrese capacitacion';
        }
        if (empty(trim($this->datos['fecha']))) {
            $this->respuesta['msg'] = 'por favor ingrese fecha ';
        }
        
        $this->almacenar_capacim();
    }
    private function almacenar_capacim()
    { //insertar datos en login la informacion obtenidos de las cajas de texto
        if ($this->respuesta['msg'] === 'correcto') {
            if ($this->datos['accion'] === 'nuevo') {
                $this->db->consultas('
                    INSERT INTO capacim (idCapacitador,idLugar,idCapacitacion,fecha) VALUES(
                        "' . $this->datos['capacitador']['id'] . '",
                        "' . $this->datos['lugar']['id'] . '",
                        "' . $this->datos['capacitacion']['id'] . '",
                        "' . $this->datos['fecha'] . '"
                    )
                ');
                //mensaje de resultado de la peticion 
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if ($this->datos['accion'] === 'modificar') {
                //actualizar datos 
                $this->db->consultas('
                    UPDATE capacim SET
                        idCapacitador    = "' . $this->datos['capacitador']['id'] . '",
                        idLugar          = "' . $this->datos['lugar']['id'] . '",
                        idCapacitacion   = "' . $this->datos['capacitacion']['id'] . '",
                        fecha            = "' . $this->datos['fecha'] . '"
                    WHERE idCapacim    = "' . $this->datos['idCapacim'] . '"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarCapacim($valor = '')
    {
        if (substr_count($valor, '-') === 2) {
            $valor = implode('-', array_reverse(explode('-', $valor)));
        }
        $this->db->consultas('
            select capacim.idCapacim, capacim.idCapacitador, capacim.idLugar,capacim.idCapacitacion, 
                capacim.fecha,capacitador.nombre,
                lugar.direccion,capacitacion.nombre
            from capacim
                inner join capacitador on(capacitador.idCapacitador=capacim.idCapacitador)
                inner join lugar on(lugar.idLugar=capacim.idLugar)
                inner join capacitacion on(capacitacion.idCapacitacion=capacim.idCapacitacion)
                where capacitador.nombre like "%' . $valor . '%" or 
                lugar.direccion like "%' . $valor . '%" or 
                capacitacion.nombre like "%' . $valor . '%" or
                capacim.fecha like "%' . $valor . '%"
        ');
        $capacim = $this->respuesta = $this->db->obtener_datos();
        foreach ($capacim as $key => $value) {
            $datos[] = [
                'idCapacim' => $value['idCapacim'],
                'capacitador'      => [
                    'id'      => $value['idCapacitador'],
                    'label'   => $value['nombre']
                ],
                'lugar'    => [
                    'id'      => $value['idLugar'],
                    'label'   => $value['direccion']
                ],
                'capacitacion'    => [
                    'id'      => $value['idCapacitacion'],
                    'label'   => $value['nombre']
                ],
                'fecha'    => $value['fecha']

            ];
        }
        return $this->respuesta = $datos;
    }
    public function traer_lugar_capacitador()
    {
        $this->db->consultas('
            select lugar.direccion AS label, lugar.idLugar AS id
            from lugar
        ');
        $lugar = $this->db-> obtener_datos();

        $this->db->consultas('
            select capacitador.nombre AS label, capacitador.idCapacitador AS id
            from capacitador
        ');
        $capacitador = $this->db->obtener_datos();

        $this->db->consultas('
            select capacitacion.nombre AS label, capacitacion.idCapacitacion AS id
            from capacitacion
        ');
        $capacitacion = $this->db->obtener_datos();

        return $this->respuesta = ['lugar' => $lugar, 'capacitador' => $capacitador, 'capacitacion' => $capacitacion ];
    }
    public function eliminarCapacim($idCapacim = 0)
    {
        $this->db->consultas('
            DELETE capacim
            FROM capacim
            WHERE idCapacim="' . $idCapacim . '"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}