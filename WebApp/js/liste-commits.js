var idProjet = recupererIdProjetURL();

$.ajax({
	url: './php/ListerSprintsCommits.php', //toujours la même page qui est appelée
	type: 'POST',
	data: {id: idProjet}, // paramètre fonction qui détermine la fonction qui sera exécutée
	
	dataType : 'html',
	
	success: function(data) {
		$('#select_taches').html(data);
	},
	
	error:function(msg, string){
        alert( "Error tache !: " + string );
    }
});

function listerCommits() {
	var idTache = $('select option:selected').attr('id');
	$.ajax({
		url: './php/ListerCommits.php', //toujours la même page qui est appelée
		type: 'POST',
		data: {id: idTache}, // paramètre fonction qui détermine la fonction qui sera exécutée
		
		dataType : 'html',
		
		success: function(data) {
			$('#lignes_commits').html(data);
		},
		
		error:function(msg, string){
	        alert( "Error commit !: " + string );
	    }
	});
}