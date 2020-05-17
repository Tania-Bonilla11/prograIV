
  var appusuario = new Vue({
    el:'#frm-usuario',
    data:{
        usuario:{
            idUsuario    :0,
            accion       :'nuevo',
            nombre       :'',
            apellido     :'',
            correo       :'',
            genero       :'',
            msg          :''
            }
        },
        methods:{
            guardarUsuario:function(){
                fetch(`../../../private/Modulos/Usuario/procesos.php?proceso=recibirDatos&usuario=${JSON.stringify(this.usuario)}`).then(resp => resp.json()).then(resp=>{
                   if(resp.msg.indexOf("correctamente")>=0){
                    alertify.success(resp.msg);
                   } else {
                    alertify.warning(resp.msg);
                   }
                    
                 });    
            },
            limpiarUsuario:function(){
                    this.usuario.idUsuario = 0;
                    this.usuario.nombre = '';
                    this.usuario.apellido = '';
                    this.usuario.correo = '';
                    this.usuario.genero = '';
                    this.usuario.accion = 'nuevo';
                    appBuscarUsuario.buscarUsuario();
            }
        }
});