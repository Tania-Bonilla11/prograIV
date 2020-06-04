var appBuscarAdmin= new Vue({
    el: '#frm-buscar-admin',
    
    data: {
        misadmin: [],
        valor: ''
    },
    methods: {
        buscarAdmin: function () {
            fetch(`private/Modulos/Admin/procesos.php?proceso=buscarAdmin&admin=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.misadmin = resp;
            });
        },
        modificarAdmin: function (admin) {
            appadmin.admin =admin;
            appadmin.admin.accion = 'modificar';
        },
        eliminarAdmin: function (idAdmin) {
            alertify.confirm("Mantenimiento Administrador","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Admin/procesos.php?proceso=eliminarAdmin&admin=${idAdmin}`).then(resp => resp.json()).then(resp => {
                this.buscarAdmin();
            });
                alertify.success('Registro eliminado correctamente');
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