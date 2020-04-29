    var appBuscarClientes = new Vue({
    el: '#frm-buscar-clientes',
    
    data: {
        misclientes: [],
        valor: ''
    },
    methods: {
        buscarClientes: function () {
            fetch(`private/Modulos/Clientes/procesos.php?proceso=buscarClientes&clientes=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.misclientes = resp;
            });
        },
        modificarClientes: function (clientes) {
            appclientes.clientes = clientes;
            appclientes.clientes.accion = 'modificar';
        },
        eliminarClientes: function (idCliente) {
            fetch(`private/Modulos/Clientes/procesos.php?proceso=eliminarClientes&clientes=${idCliente}`).then(resp => resp.json()).then(resp => {
                this.buscarClientes();
            });
        
        }
    },
    created: function () {
        this.buscarClientes();
    }
});
