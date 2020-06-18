var appBuscarAdmin= new Vue({
    el: '#frm-buscar-admin',
    
    data: {
        misadmin: [],
        valor: ''
    },
    methods: {
        buscarAdmin: function () {
            fetch(`private/Modulos/Admin/procesos.php?proceso=buscarAdmin&usuario=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.misadmin = resp;
            });
        },
        modificarAdmin: function (usuario) {
            appadmin.usuario =usuario;
            appadmin.usuario.accion = 'modificar';
        },
        eliminarAdmin: function (id) {
            alertify.confirm("Mantenimiento Administrador","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Admin/procesos.php?proceso=eliminarAdmin&usuario=${id}`).then(resp => resp.json()).then(resp => {
                this.buscarAdmin();
            });
                alertify.success('Administrador eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el Admin');
            });
        }
    },
    created: function () {
        this.buscarAdmin();
    }
});