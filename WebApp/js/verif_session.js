function verifSession(){
$.ajax({
	url: './php/Verifier2.php', //toujours la même page qui est appelée
	type: 'POST',
	data: {}, // paramètre fonction qui détermine la fonction qui sera exécutée
	success: function(data) {
		if(! data){
			document.location.href='./php/Deconnexion.php';
		}
	}
});
}