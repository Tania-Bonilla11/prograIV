  
document.addEventListener("DOMContentLoaded",(event)=>{

	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');
	
	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
	});




	form.addEventListener('submit', e => {
		e.preventDefault();
		
		checkInputs();
	});
	
	function checkInputs() {
		// trim to remove the whitespaces
		const usernameValue = username.value.trim();
		const emailValue = email.value.trim();
		const passwordValue = password.value.trim();
		const password2Value = password2.value.trim();
		
		if(usernameValue === ''|| usernameValue == null) {
			setErrorFor(username, 'Nombre necesario');
		} else {
			setSuccessFor(username);
		}
		
		if(emailValue === '') {
			setErrorFor(email, 'Ingrese correo');
		} else if (!isEmail(emailValue)) {
			setErrorFor(email, 'correo no valido');
		} else {
			setSuccessFor(email);
		}
		
		if(passwordValue === '' || passwordValue == null ||passwordValue.length <= 6) {
			setErrorFor(password, 'Contraseña necesaria,debe ser mayor de 6 caracteres');
		} else {
			setSuccessFor(password);
		}
	
		
		if(password2Value === ''|| password2Value == null ||password2Value.length <= 6) {
			setErrorFor(password2, 'debe confirmar contraseña');
		} else if(passwordValue !== password2Value) {
			setErrorFor(password2, 'contraseñas no coinciden');
		} else{
			setSuccessFor(password2);
		}
	}
	
	function setErrorFor(input, message) {
		const formControl = input.parentElement;
		const small = formControl.querySelector('small');
		formControl.className = 'con error';
		small.innerText = message;
	}
	
	function setSuccessFor(input) {
		const formControl = input.parentElement;
		formControl.className = 'con success';
	}
		
	function isEmail(email) {
		return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
	}
	  
	
	
	