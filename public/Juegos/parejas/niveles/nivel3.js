var symbols = ['warning', 'warning', 'wheelchair', 'wheelchair', 'ban', 'ban', 'cutlery', 'cutlery', 'h-square', 'h-square', 'plane', 'plane', 'exchange', 'exchange', 'phone-square', 'phone-square','hotel','hotel','bus','bus','level-up','level-up','level-down','level-down'],
		opened = [],
		match = 0,
		moves = 0,
		$deck = $('.deck'),
		$scorePanel = $('#score-panel'),
		$moveNum = $scorePanel.find('.moves'),
		$ratingStars = $scorePanel.find('i'),
		$restart = $scorePanel.find('.restart'),
		delay = 800,
		gameCardsQTY = symbols.length / 2,
		rank3stars = gameCardsQTY + 2,
		rank2stars = gameCardsQTY + 6,
		rank1stars = gameCardsQTY + 10;

// Shuffle function From http://stackoverflow.com/a/2450976
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;
	
  while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function initGame() {
	var cards = shuffle(symbols);
  $deck.empty();
  match = 0;
  moves = 0;
  $moveNum.html(moves);
  $ratingStars.removeClass('fa-star-o').addClass('fa-star');
	for (var i = 0; i < cards.length; i++) {
		$deck.append($('<li class="card"><i class="fa fa-' + cards[i] + '"></i></li>'))
	}
};

// Set Rating and final Score
function setRating(moves) {
	var rating = 3;
	if (moves > rank3stars && moves < rank2stars) {
		$ratingStars.eq(2).removeClass('fa-star').addClass('fa-star-o');
		rating = 2;
	} else if (moves > rank2stars && moves < rank1stars) {
		$ratingStars.eq(1).removeClass('fa-star').addClass('fa-star-o');
		rating = 1;
	} else if (moves > rank1stars) {
		$ratingStars.eq(0).removeClass('fa-star').addClass('fa-star-o');
		rating = 0;
	}	
	return { score: rating };
};

// End Game
function endGame(moves, score) {
	var resp = '';

	$.ajax({
		// la URL para la petición
		url : '../../../../private/Modulos/Juegos/guardarHistorial.php',
		// la información a enviar
		// (también es posible utilizar una cadena de datos)
		data : {
			id : user_id,
			nivel : level,
			mov : moves
		},
		// especifica si será una petición POST o GET
		type : 'POST',
		// código a ejecutar si la petición es satisfactoria;
		// la respuesta es pasada como argumento a la función
		success : function(data) {
			resp = data;
		},
		// código a ejecutar si la petición falla;
		// son pasados como argumentos a la función
		// el objeto de la petición en crudo y código de estatus de la petición
		error : function(xhr, status) {
			alert('Disculpe, existió un problema');
		}
	});

	Swal.fire({
		allowEscapeKey: false,
		allowOutsideClick: false,
		title:'Puntaje del Jugador',
		icon: 'success',
		title: '¡Encontrastes las parejas!',
		text: ' Con  ' + moves + ' Moviminetos '  + 'Excelente Haz completado el ultimo nivel',
		type: 'success',
		confirmButtonColor: '#9BCB3C',
		confirmButtonText: 'Jugar',
		showCancelButton: true,
		cancelButtonText: 'Ver historial'
	}).then(function(result) {
		if (result.value) {
			initGame();
		}
		else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		  ) {
			Swal.fire({
				allowEscapeKey: false,
			  	allowOutsideClick: false,
			  	title: 'Record del Juego',
				html: '<table id="record" class="table" style="margin-left: auto; margin-right: auto;"><thead class="thead-dark"><tr><th scope="col">#</th><th scope="col">Jugador</th><th scope="col">Nivel</th><th scope="col">Movimientos</th></tr></thead>' + 
				'<tbody id="table_body">' + resp + '</tbody></table>'
			}).then(function(result){
				if (result.value){
					initGame();
				}
			})
		  }
	})
}

// Restart Game
// Restart Game
$restart.on('click', function() {
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButtonColor: '#9BCB3C',
			cancelButtonColor: '#EE0E51',
		},
		buttonsStyling: true
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: '¿Estas Seguro de Repetir la Partida?',
		text: "Se perderan las parejas que haz encontrado",
		icon: 'question',
		showCancelButton: true,
		confirmButtonText: 'Nueva Partida',
		cancelButtonText: '¡Seguire Jugando!',
		reverseButtons: true
	  }).then((result) => {
		if (result.value) {
			initGame();
		  swalWithBootstrapButtons.fire(
			'Tu Partida se ha reiniciado',
			'¡mucha suerte en esta partida!',
			'success'
		  ) 
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'Sigue jugando :)',
			'info'
			
		  )
		 
		}
	  })
});

// Card flip
$deck.on('click', '.card:not(".match, .open")', function() {
	if($('.show').length > 1) { return true; }
	
	var $this = $(this),
			card = $this.context.innerHTML;
  $this.addClass('open show');
	opened.push(card);

	// Compare with opened card
  if (opened.length > 1) {
    if (card === opened[0]) {
      $deck.find('.open').addClass('match animated infinite rubberBand');
      setTimeout(function() {
        $deck.find('.match').removeClass('open show animated infinite rubberBand');
      }, delay);
      match++;
    } else {
      $deck.find('.open').addClass('notmatch animated infinite wobble');
			setTimeout(function() {
				$deck.find('.open').removeClass('animated infinite wobble');
			}, delay / 1.5);
      setTimeout(function() {
        $deck.find('.open').removeClass('open show notmatch animated infinite wobble');
      }, delay);
    }
    opened = [];
		moves++;
		setRating(moves);
		$moveNum.html(moves);
  }
	
	// End Game if match all cards
	if (gameCardsQTY === match) {
		setRating(moves);
		var score = setRating(moves).score;
		setTimeout(function() {
			endGame(moves, score);
		}, 500);
  }
});

initGame();