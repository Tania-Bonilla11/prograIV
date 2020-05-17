var appBuscarUsuario= new Vue({
    el: '#frm-buscar-usuario',
    
    data: {
        misusuario: [],
        valor: ''
    },
    methods: {
        buscarUsuario: function () {
            fetch(`../../../private/Modulos/Usuario/procesos.php?proceso=buscarUsuario&usuario=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.misusuario = resp;
            });
        },
        modificarUsuario: function (usuario) {
            appusuario.usuario =usuario;
            appusuario.usuario.accion = 'modificar';
        },
        eliminarUsuario: function (idUsuario) {
            alertify.confirm("Mantenimiento Usuarios","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`../../../private/Modulos/Usuario/procesos.php?proceso=eliminarUsuario&usuario=${idUsuario}`).then(resp => resp.json()).then(resp => {
                this.buscarUsuario();
            });
                alertify.success('Registro eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el usuario');
            });
        }
    },
    created: function () {
        this.buscarUsuario();
    }
});