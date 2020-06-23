/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file buscar-capacitador.js -> Mantenimiento de buscar capacitador 
 */

var appBuscarCapacitador= new Vue({
    el: '#frm-buscar-capacitador',
    
    data: {
        //array para tener los datos del capacitador
        miscapacitador: [],
        valor: ''
    },
    methods: {
        //se llama la funcion en el php donde esta la consulta con la base y donde se encientran las funciones para actualizar o eliminar datos
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