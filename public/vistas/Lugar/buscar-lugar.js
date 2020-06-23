/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file buscar-lugar.js -> Mantenimiento de lugares a visitar
 */

var appBuscarLugar= new Vue({
    el: '#frm-buscar-lugar',
    //array para tener los datos del admin
    data: {
        mislugar: [],
        valor: ''
    },
    methods: {
        buscarLugar: function () {
            //se llama la funcion en el php donde esta la consulta con la base y donde se encientran las funciones para actualizar o eliminar datos
            fetch(`private/Modulos/Lugar/procesos.php?proceso=buscarLugar&lugar=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.mislugar = resp;
            });
        },
        modificarLugar: function (lugar) {
            applugar.lugar =lugar;
            applugar.lugar.accion = 'modificar';
        },
        eliminarLugar: function (idLugar) {
            alertify.confirm("Mantenimiento Lugar","¿Estas seguro de eliminar el registro?",
           ()=>{
            fetch(`private/Modulos/Lugar/procesos.php?proceso=eliminarLugar&lugar=${idLugar}`).then(resp => resp.json()).then(resp => {
                this.buscarLugar();
            });
                alertify.success('Registro eliminado correctamente');
            },
            ()=>{
                alertify.error('Accion de eliminar cancelada por el usuario');
            });
        }
    },
    created: function () {
        this.buscarLugar();
    }
});
