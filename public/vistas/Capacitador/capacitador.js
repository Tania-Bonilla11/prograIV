/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file capacitador.js -> Obtener informacion del capacitador 
 */


var appcapacitador = new Vue({
    el:'#frm-capacitador',
    data:{//json y colocacion del nivel de privilegio de usuario
        capacitador:{
            idCapacitador:0,
            accion     :'nuevo',
           correo      :'',
            usuario    :'',
            clave      :'',
            privilegio :'2',
            nombre     :'',
            apellido   :'',
            direccion  :'',
            telefono   :'',
            genero     :'',
            msg        :''
            }
        },
        methods:{
            //lugar de funciones para  manipulacion de datos recibidas de procesos.php
            guardarCapacitador:function(){
                fetch(`private/Modulos/Capacitador/procesos.php?proceso=recibirDatos&capacitador=${JSON.stringify(this.capacitador)}`).then(resp => resp.json()).then(resp=>{
                    if(resp.msg.indexOf("correctamente")>=0){
                        alertify.success(resp.msg);
                       } else {
                        alertify.warning(resp.msg);
                       }
                 });
            },
            //quitar los valores de los input para nuevo capacitador
            limpiarCapacitador:function(){
                    this.capacitador.idCapacitador = 0;
                    this.capacitador.correo = '';
                    this.capacitador.usuario = '';
                    this.capacitador.clave = '';
                    this.capacitador.nombre = '';
                    this.capacitador.apellido = '';
                    this.capacitador.direccion = '';
                    this.capacitador.telefono = '';
                    this.capacitador.genero = '';
                    this.capacitador.accion = 'nuevo';
                    appBuscarCapacitador.buscarCapacitador();
            }
        }
});