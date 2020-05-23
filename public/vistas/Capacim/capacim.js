Vue.component('v-select', VueSelect.VueSelect);

var appcapacim = new Vue({
    el: '#frm-capacim',
    data: {
        capacim: {
            idCapacim: 0,
            accion: 'nuevo',
            capacitador: {
                id: 0,
                label: ''
            },
            lugar: {
                id: 0,
                label: ''
            },
            capacitacion: {
                id: 0,
                label: ''
            },
            fecha: '',
            valor: '',
            msg: ''
        },
        capacitador: {},
        lugar      : {},
        capacitacion:{}
    },
    methods: {
        guardarCapacim() {
            fetch(`private/Modulos/Capacim/procesos.php?proceso=recibirDatos&capacim=${JSON.stringify(this.capacim)}`).then(resp => resp.json()).then(resp => {
                if(resp.msg.indexOf("correctamente")>=0){
                    alertify.success(resp.msg);
                   } else {
                    alertify.warning(resp.msg);
                   }
            });
        },
        limpiarCapacim() {
            this.capacim.idCapacim = 0;
            this.capacim.accion = "nuevo";
            this.capacim.capacitador = '';
            this.capacim.lugar = '';
            this.capacim.capacitacion = '';
            this.capacim.fecha = '';
            this.capacim.msg = "";
        }
    },
    created() {
        fetch(`private/Modulos/Capacim/procesos.php?proceso=traer_lugar_capacitador&capacim=''`).then(resp => resp.json()).then(resp => {
            this.capacitador = resp.capacitador;
            this.lugar = resp.lugar;
            this.capacitacion = resp.capacitacion;
        });
    }
});