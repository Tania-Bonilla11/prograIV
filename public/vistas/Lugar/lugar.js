var applugar = new Vue({
    /**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file lugar.js -> Obtener datos de los input en array y llamar funciones desde el php
 */

    el:'#frm-lugar',
    data:{
         lugar:{
            idLugar    :0,
            accion       :'nuevo',
            direccion      :'',
            solicitante    :'',
            telefono       :'',
            msg            :''
            }
        },
        methods:{
            guardarLugar:function(){
                fetch(`private/Modulos/Lugar/procesos.php?proceso=recibirDatos&lugar=${JSON.stringify(this.lugar)}`).then(resp => resp.json()).then(resp=>{
                    if(resp.msg.indexOf("correctamente")>=0){
                        alertify.success(resp.msg);
                       } else {
                        alertify.warning(resp.msg);
                       }
                   
                 });    
            },
            limpiarLugar:function(){
                this.lugar.idLugar = 0;
                this.lugar.direccion = '';
                this.lugar.solicitante= '';
                this.lugar.telefono= '';
                this.lugar.accion = 'nuevo';
                appBuscarLugar.buscarLugar();
            }
        }
});