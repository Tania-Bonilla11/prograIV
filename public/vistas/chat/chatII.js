


    
/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file chatII.js ->Diseño
 */

/**@funtion -> funcionamiento para que el chat se pueda expandir  */
(function() {
	

	
	$('#live-chat header').on('click', function() {

		$('.chat').slideToggle(300, 'swing');
		$('.chat-message-counter').fadeToggle(300, 'swing');/**px del login */

	});
	

	$('.chat-close').on('click', function(e) {/**cerrar el chat */

		e.preventDefault();
		$('#live-chat').fadeOut(300);

	});
	
}) ();
