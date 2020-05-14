var appcapacitacion = new Vue({
    el:'#frm-capacitacion',
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