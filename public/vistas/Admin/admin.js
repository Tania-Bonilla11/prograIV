/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file app.js -> Mostrar los formularios de los formularios
 */

  var appadmin = new Vue({
    el:'#frm-Admin',
    //se hace un json para colocar los datos delv-model
    data:{
        admin:{
            idAdmin    :0,
            accion     :'nuevo',
            correo     :'',
            usuario    :'',
            clave      :'',
            privilegio :'1',
            nombre     :'',
            apellido   :'',
            direccion  :'',
            telefono   :'',
            genero     :'',
            msg        :''
            }
        },
        methods:{
            guardarAdmin:function(){
             //se llama las funciones de php para enviar los datos en forma de json      
              fetch(`private/Modulos/Admin/procesos.php?proceso=recibirDatos&admin=${JSON.stringify(this.admin)}`).then(resp => resp.json()).then(resp=>{
                   if(resp.msg.indexOf("correctamente")>=0){
                    alertify.success(resp.msg);
                   } else {
                    alertify.warning(resp.msg);
                   }
                    
                 });    
            },
            limpiarAdmin:function(){
              //para dejar los valores de los input en blanco 
                    this.admin.idAdmin = 0;
                    this.admin.correo = '';
                    this.admin.usuario = '';
                    this.admin.clave = '';
                    this.admin.privilegio = '';
                    this.admin.nombre = '';
                    this.admin.apellido = '';
                    this.admin.direccion = '';
                    this.admin.telefono = '';
                    this.admin.genero = '';
                    this.admin.accion = 'nuevo';
                    appBuscarAdmin.buscarAdmin();
            }
        }
});

