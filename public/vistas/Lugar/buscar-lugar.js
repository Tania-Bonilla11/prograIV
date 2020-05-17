var appBuscarLugar= new Vue({
    el: '#frm-buscar-lugar',
    
    data: {
        mislugar: [],
        valor: ''
    },
    methods: {
        buscarLugar: function () {
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
