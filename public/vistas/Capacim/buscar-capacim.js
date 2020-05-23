var appbuscar_capacim = new Vue({
    el: '#frm-buscar-capacim',
    data: {
        mis_capacim: [],
        valor: ''
    },
    methods: {
        buscarCapacim() {
            fetch(`private/Modulos/Capacim/procesos.php?proceso=buscarCapacim&capacim=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.mis_capacim = resp;
            });
        },
        modificarCapacim(capacim) {
            appcapacim.capacim = capacim;
            appcapacim.capacim.accion = 'modificar';
        },
        eliminarCapacim(idCapacim) {
            alertify.confirm("Mantenimiento Capacitaciones Impartidas","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Capacim/procesos.php?proceso=eliminarCapacim&capacim=${idCapacim}`).then(resp => resp.json()).then(resp => {
                this.buscarCapacim();
            });
                alertify.success('Registro eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el usuario');
            });
        }
    },
    created() {
        this.buscarCapacim();
    }
});