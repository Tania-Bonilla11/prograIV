/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file buscar-capacitacion.js -> Mostrar los formularios de los formularios
 */

var appBuscarCapacitacion = new Vue({
    el: '#frm-buscar-capacitacion',
//array para tener los datos del admin
    data: {
        miscapacitacion: [],
        valor: ''
    },
    methods: {
        //se llama la funcion en el php donde esta la consulta con la base y donde se encientran las funciones para actualizar o eliminar datos
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
