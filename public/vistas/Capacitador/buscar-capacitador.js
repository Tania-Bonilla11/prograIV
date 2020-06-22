var appBuscarCapacitador= new Vue({
    el: '#frm-buscar-capacitador',
    
    data: {
        miscapacitador: [],
        valor: ''
    },
    methods: {
        buscarCapacitador: function () {
            fetch(`private/Modulos/Capacitador/procesos.php?proceso=buscarCapacitador&capacitador=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.miscapacitador = resp;
            });
        },
        modificarCapacitador: function (idCapacitador) {
            appcapacitador.capacitador =idCapacitador;
            appcapacitador.capacitador.accion = 'modificar';
        },
        eliminarCapacitador: function (idCapacitador) {
            alertify.confirm("Mantenimiento Capacitador","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Capacitador/procesos.php?proceso=eliminarCapacitador&capacitador=${idCapacitador}`).then(resp => resp.json()).then(resp => {
                this.buscarCapacitador();
            });
                alertify.success('Registro eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el Capacitador');
            });
        }
    },
    created: function () {
        this.buscarCapacitador();
    }
});