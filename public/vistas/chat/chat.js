/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file chat.js -> Envio de mensaje
 */


/**@connect -> conectarse al servidor 3001 */
var socket = io.connect("http://localhost:3001",{'forceNew':true}),
    appchat = new Vue({
        el:'#frm-chat',/**llamar  */
        data:{
            msg : '',
            msgs : []
        },
        methods:{
            enviarMensaje(){
                socket.emit('enviarMensaje', this.msg);/**mandar mensaje  */
                this.msg = '';
            },
            limpiarChat(){
                this.msg = '';
            }
        },
        created(){
            socket.emit('chatHistory');
        }
    });
    socket.on('recibirMensaje',msg=>{/**recibe el mensaje */
        console.log(msg);
        appchat.msgs.push(msg);
    });
    socket.on('chatHistory',msgs=>{
        appchat.msgs = [];
        msgs.forEach(item => {
            appchat.msgs.push(item.msg);
        });
    });
    (function() {
	

	
        $('#live-chat header').on('click', function() {
    
            $('.chat').slideToggle(300, 'swing');
            $('.chat-message-counter').fadeToggle(300, 'swing');
    
        });
        
    
        $('.chat-close').on('click', function(e) {/**boton de cerrar */
    
            e.preventDefault();
            $('#live-chat').fadeOut(300);
    
        });
        
    }) ();
    
    
        