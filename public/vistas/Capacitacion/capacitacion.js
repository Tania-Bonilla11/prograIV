/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file capacitacion.js -> Mantenimiento de capacitaciones impartidas
 */

var appcapacitacion = new Vue({
    el:'#frm-capacitacion',
    //se hace un json para colocar los datos delv-model
    data:{
        capacitacion:{
            idCapacitacion   :0,
            accion           :'nuevo',
            nombre           :'',
            tiempo           :'',
            msg              :''
            }
        },
        methods:{
            guardarCapacitacion:function(){
                //se llama las funciones de php para enviar los datos en forma de json 
                fetch(`private/Modulos/Capacitacion/procesos.php?proceso=recibirDatos&capacitacion=${JSON.stringify(this.capacitacion)}`).then(resp => resp.json()).then(resp=>{
                    if(resp.msg.indexOf("correctamente")>=0){
                        alertify.success(resp.msg);
                       } else {
                        alertify.warning(resp.msg);
                       } 
                 });
            },
            limpiarCapacitacion:function(){
                this.capacitacion.idCapacitacion = 0;
                this.capacitacion.nombre = '';
                this.capacitacion.tiempo = '';
                this.capacitacion.accion = 'nuevo';
                appBuscarCapacitacion.buscarCapacitacion();
            }
        }
});