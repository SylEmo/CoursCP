function recupererIdProjetURL(){
	var params = window.location.search;
	var param;
	var i;
	
	params = params.substring(1);
	params = params.split("&");
	for(i = 0; i < params.length; i++){
		param = params[i].split("=");
		if(param[0] == "id"){
			return param[1];
		}
	}
}

function recupererIdsProjetSprintURL(){
	var params = window.location.search;
	var param;
	var i;
	var idProjet, idSprint;
	var tabIds = [];

	params = params.substring(1);
	params = params.split("&");
	for(i = 0; i < params.length; i++){
		param = params[i].split("=");
		if(param[0] == "idProjet"){
			idProjet = param[1];
		}
		if(param[0] == "idSprint"){
			idSprint = param[1];
		}
	}
	tabIds.push({idProjet : idProjet, idSprint : idSprint});
	return tabIds;
}