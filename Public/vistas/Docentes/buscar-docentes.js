var appBuscarDocentes= new Vue({
    el: '#frm-buscar-docentes',
    
    data: {
        docente: [],
        valor: ''
    },
    methods: {
        buscarDocente: function () {
            fetch(`private/Modulos/Docentes/procesosdoc.php?proceso=buscarDocente&docente=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.docente = resp;
            });
        },
        modificarDocente: function (docente) {
            appdocente.docente = docente;
            appdocente.docente.accion = 'modificar';
        },
        eliminarDocente: function (idDocente) {
            fetch(`private/Modulos/Docentes/procesosdoc.php?proceso=eliminarDocente&docente=${idDocente}`).then(resp => resp.json()).then(resp => {
                this.buscarDocente();
            });
        
        }
    },
    created: function () {
        this.buscarDocente();
    }
});