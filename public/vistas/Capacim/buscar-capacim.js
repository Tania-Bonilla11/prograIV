/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file buscar-capacim.js -> Mantenimiento de capacitaciones impartidas
 */
var appbuscar_capacim = new Vue({
    el: '#frm-buscar-capacim',
    data: {
        //array para tener los datos del admin
        mis_capacim: [],
        valor: ''
    },
    methods: {
         //se llama la funcion en el php donde esta la consulta con la base y donde se encientran las funciones para actualizar o eliminar datos
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