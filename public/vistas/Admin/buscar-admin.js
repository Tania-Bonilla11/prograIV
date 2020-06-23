/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file buscar-admin.js -> Mantenimientos de datos de administrador
 */
var appBuscarAdmin= new Vue({
    el: '#frm-buscar-admin',
    
    data: {
        //aray para tener los datos del admin
        misadmin: [],
        valor: ''
    },
    methods: {
        //se llama la funcion en el php donde esta la consulta con la base y donde se encientran las funciones para actualizar o eliminar datos
        buscarAdmin: function () {
            fetch(`private/Modulos/Admin/procesos.php?proceso=buscarAdmin&admin=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.misadmin = resp;
            });
        },
        modificarAdmin: function (idAdmin) {
            appadmin.admin =idAdmin;
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