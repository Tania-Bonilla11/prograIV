
  var appadmin = new Vue({
    el:'#frm-Admin',
    data:{
        usuario:{
            id           :0,
            correo       :'',
            usuario      :'',
            clave        :'',
            privilegio   :1,
            nombre       :'',
            apellido     :'',
            direccion    :'',
            telefono     :'',
            genero       :'',
            accion       :'nuevo',
             msg         :''
            
            
           
            }
        },
        methods:{
            guardarAdmin:function(){
                fetch(`private/Modulos/Admin/procesos.php?proceso=recibirDatos&usuario=${JSON.stringify(this.usuario)}`).then(resp => resp.json()).then(resp=>{
                   if(resp.msg.indexOf("correctamente")>=0){
                    alertify.success(resp.msg);
                   } else {
                    alertify.warning(resp.msg);
                   }
                    
                 });    
            },
            limpiarAdmin:function(){
                    this.usuario.id     =   0;
                    this.usuario.correo =   '';
                    this.usuario.usuario =  '';
                    this.usuario.clave =    '';
                    this.usuario.privilegio= 1;
                    this.usuario.nombre =   '';
                    this.usuario.apellido = '';
                    this.usuario.direccion ='';
                    this.usuario.telefono = '';
                    this.usuario.genero =   '';
                    this.usuario.accion =   'nuevo';
                    appBuscarAdmin.buscarAdmin();
                    
                    

            }
        }
});