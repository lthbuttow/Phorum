function func1(){
	document.getElementById("titulo").style.borderColor='#ede6e6';
	document.getElementById("titulo").style.backgroundColor='#e2edff';
	// this.style.backgroundColor='#e2edff'
	return false;
}

function func2(){
	document.getElementById("descricao").style.borderColor='#ede6e6';
	document.getElementById("descricao").style.backgroundColor='#e2edff';
	// this.style.backgroundColor='#e2edff'
	return false;
}

function verificaTitulo() {

	document.getElementById("titulo").style.backgroundColor='#fff';

	var title = document.getElementById("titulo").value;

	if (title.length < 5) {
		document.getElementsByName('titulo')[0].value='';
		document.getElementsByName('titulo')[0].placeholder='Digite um titulo com no mínimo 4 letras!';
		document.getElementById("titulo").style.borderColor='#e20000';
		return false;
		}
	return false;
}

function verificaConteudo() {

	document.getElementById("descricao").style.backgroundColor='#fff';

	var desc = document.getElementById("descricao").value;

	if (desc.length <= 5) {
		document.getElementsByName('descricao')[0].value='';
		document.getElementsByName('descricao')[0].placeholder='Seu Post deve ter no mínimo 5 caracteres!';
		document.getElementById("descricao").style.borderColor='#e20000';
		return false;
		}
	return false;
}




