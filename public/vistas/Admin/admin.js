
  var appadmin = new Vue({
    el:'#frm-Admin',
    data:{
        admin:{
            idAdmin    :0,
            accion     :'nuevo',
            correo     :'',
            usuario    :'',
            clave      :'',
            privilegio :'',
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
                fetch(`private/Modulos/Admin/procesos.php?proceso=recibirDatos&admin=${JSON.stringify(this.admin)}`).then(resp => resp.json()).then(resp=>{
                   if(resp.msg.indexOf("correctamente")>=0){
                    alertify.success(resp.msg);
                   } else {
                    alertify.warning(resp.msg);
                   }
                    
                 });    
            },
            limpiarAdmin:function(){
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

