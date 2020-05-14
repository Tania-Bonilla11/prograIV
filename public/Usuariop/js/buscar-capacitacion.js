var appBuscarCapacitacion = new Vue({
    el: '#frm-buscar-capacitacion',
    
    data: {
        miscapacitacion: [],
        valor: ''
    },
    methods: {
        buscarCapacitacion: function () {
            fetch(`private/Modulos/Capacitacion/procesos.php?proceso=buscarCapacitacion&capacitacion=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.miscapacitacion = resp;
            });
        },
        modificarCapacitacion: function (capacitacion) {
            appcapacitacion.capacitacion = capacitacion;
            appcapacitacion.capacitacion.accion = 'modificar';
        },
        eliminarCapacitacion: function (idCapacitacion) {

            alertify.confirm("Mantenimiento Capacitacion","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Capacitacion/procesos.php?proceso=eliminarCapacitacion&capacitacion=${idCapacitacion}`).then(resp => resp.json()).then(resp => {
                this.buscarCapacitacion();
            });
                alertify.success('Registro eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el usuario');
            });
        }
    },
    created: function () {
        this.buscarCapacitacion();
    }
});
